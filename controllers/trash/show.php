<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);

$note = $db->query('select * from notes where id = :id and user_id = :user_id and deleted_at IS NOT NULL', [
    'id' => $_GET['id'],
    'user_id' => $currentUser
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view("trash/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
