<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];
$currentUser = $_SESSION['user']['user_id'];
$email = $_SESSION['user']['email'];

if (!$currentUser) {
    //echo 'no user id';
    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->get();

    $user_id = $user[0]['id'];
    $currentUser = $user_id;
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $currentUser
]);

header('location: /notes');
die();
