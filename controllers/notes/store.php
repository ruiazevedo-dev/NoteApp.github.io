<?php

use Core\App;
use Core\Validator;
use Core\Database;



$db = App::resolve(Database::class);
$errors = [];

$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);


if (!Validator::string($_POST['excerpt'], 1, 255)) {
    $errors['excerpt'] = 'A Excerpt of no more than 255 characters is required.';
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


$db->query('INSERT INTO notes(excerpt,body, user_id,created_at) VALUES(:excerpt,:body, :user_id, :created_at )', [
    'excerpt' => $_POST['excerpt'],
    'body' => $_POST['body'],
    'user_id' => $currentUser,
    'created_at' => getTime()
]);

header('location: /notes');
die();
