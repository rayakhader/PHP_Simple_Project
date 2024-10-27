<?php

use Core\Authenticator;
use Http\Forms\LoginForm;



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


$auth = new Authenticator();
$signedIn = $auth->attempt(
    $attributes['email'],
    $attributes['password']
);
if (!$signedIn) {
    $form->error(
        'email',
        'No matching account found for that email address and password.'
    )->throw();
}
redirect('/');


// this make problem 
// return view('session/create.view.php', [
//     'errors' =>  $form->errors()
// ]);
