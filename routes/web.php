<?php
/* appeler les routes qui sont dans ces deux fichier là car c'est seulemnent ici que les routes sont exécutées */
require __DIR__.'/front.php';
require __DIR__.'/admin.php';
require __DIR__.'/api.php';

Route::get('/test-mail', function () {
    $validated = [
        'prenom' => 'Test',
        'nom' => 'Contact',
        'email' => 'akadimadina0@gmail.com',
        'sujet' => 'test',
        'message' => 'grace test'
    ];

    try {
        Mail::to('akadimadina0@gmail.com')->send(new \App\Mail\ContactMessage($validated));
        dd('Mail envoyé'); // test réussi
    } catch (\Exception $e) {
        dd($e->getMessage()); // affichera l’erreur SMTP si ça échoue
    }
});

