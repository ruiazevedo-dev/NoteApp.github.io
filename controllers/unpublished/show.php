<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);

$note = $db->query('select * from notes where id = :id and user_id = :user_id and deleted_at IS NULL and is_published = 0', [
    'id' => $_GET['id'],
    'user_id' => $currentUser
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view("unpublished/show.view.php", [
    'heading' => 'Unpublished Notes',
    'note' => $note
]);
