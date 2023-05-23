<?php

use Core\App;
use Core\Database;

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

$notes = $db->query('select * from notes where user_id = :user_id', [
    'user_id' => $currentUser
])->get();


view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
