<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'sujet' => 'required|string',
            'message' => 'required|string|min:10'
        ]);

        try {
            // Envoi de l'email
            Mail::to('akadimadina0@gmail.com')->send(new ContactMessage($validated));

            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');

        } catch (\Exception $e) {
            // En cas d'erreur d'envoi d'email
            \Log::error('Erreur envoi email contact: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.');
        }
    }
}