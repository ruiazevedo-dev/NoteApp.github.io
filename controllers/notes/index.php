<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);


$notes = $db->query('select * from notes where user_id = :user_id and deleted_at IS NULL', [
    'user_id' => $currentUser
])->get();


view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
