<?php

use Core\Validator;
use Core\App;
use Core\Authenticator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// validate the form 
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('Location: /');
    exit();
} else {
    $db->query("INSERT INTO users (`email`, `password`) VALUES (:email ,:password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator())->login([
        'email' => $email
    ]);

    // cookie has the reference to the session
    header('Location: /');
    exit();
}
