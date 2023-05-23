<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

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


// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUser);

// validate the form
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();
