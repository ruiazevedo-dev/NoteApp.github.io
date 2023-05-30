<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);


// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUser);

// validate the form
$errors = [];

if (!Validator::string($_POST['excerpt'], 1, 255)) {
    $errors['body'] = 'A excerpt of no more than 255 characters is required.';
}

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

$db->query('update notes set excerpt = :excerpt, body = :body , updated_at = :updated_at where id = :id', [
    'id' => $_POST['id'],
    'excerpt' => $_POST['excerpt'],
    'body' => $_POST['body'],
    'updated_at' => getTime()
]);

// redirect the user
header('location: /notes');
die();
