<?php

namespace App\Http\Controllers\Lecteur;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Paiement;
use Illuminate\Http\Request;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class PaiementHistoireController extends Controller
{
    public function __construct()
    {
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_MODE', 'sandbox'));
    }

    public function initierPaiement($id)
    {
        $contenu = Contenu::with(['type', 'media'])->findOrFail($id);

        if (!in_array($contenu->type->nom, ['Histoire', 'Conte'])) {
            abort(404, 'Contenu non trouvé');
        }

        return view('lecteur.paiement.histoire', compact('contenu'));
    }

    public function procesPaiement(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'telephone' => 'required'
        ]);

        $contenu = Contenu::findOrFail($id);
        $montant = env('FEDAPAY_PRICE_HISTOIRE', 500);

        try {
            $customer = [
                'firstname' => 'Lecteur',
                'lastname' => 'Anonyme',
                'email' => $request->email,
                'phone_number' => [
                    'number' => $request->telephone,
                    'country' => 'BJ'
                ]
            ];

            $transaction = Transaction::create([
                'description' => 'Accès à l\'histoire: ' . $contenu->titre,
                'amount' => $montant,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('paiement.histoire.callback'),
                'customer' => $customer
            ]);

            $paiement = Paiement::create([
                'reference' => 'HIST_' . uniqid(),
                'contenu_id' => $contenu->id,
                'type_contenu' => 'histoire',
                'montant' => $montant,
                'email_lecteur' => $request->email,
                'statut' => 'en_attente',
                'transaction_id' => $transaction->id
            ]);

            $token = $transaction->generateToken();
            return redirect()->away($token->url);

        } catch (\Exception $e) {
            \Log::error('Erreur FedaPay - Histoire: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Erreur technique. Veuillez réessayer.']);
        }
    }

    public function callback(Request $request)
    {
        $transactionId = $request->input('id');

        $paiement = Paiement::where('statut', 'en_attente')
            ->where('transaction_id', $transactionId)
            ->latest()
            ->first();

        if ($paiement) {
            $paiement->update([
                'statut' => 'paye',
                'donnees_paiement' => json_encode([
                    'status' => 'approved',
                    'transaction_id' => $transactionId,
                    'amount' => $paiement->montant,
                    'mode' => 'sandbox'
                ])
            ]);

            // Stocker l'email du lecteur en session pour accès sécurisé
            session(['lecteur_email' => $paiement->email_lecteur]);

            return redirect()->route('histoires.show', $paiement->contenu_id)
                ->with('success', 'Paiement validé! Bonne lecture ❤️');
        }

        return redirect()->route('histoires.index')
            ->with('error', 'Aucun paiement en attente trouvé.');
    }

    public function annulation()
    {
        return redirect()->route('histoires.index')
            ->with('info', 'Paiement annulé. Vous pouvez réessayer.');
    }
}
