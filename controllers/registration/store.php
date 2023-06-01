<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];

if (!Validator::string($name, 1, 255)) {
    $errors['name'] = 'A name of no more than 255 characters is required.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    $errors['user'] = "Cannot use that email. Try again";
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
    //exit();
} else {
    $db->query('INSERT INTO users(name,email, password,created_at) VALUES(:name,:email, :password,:created_at)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'created_at' => getTime(),
    ]);

    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}
