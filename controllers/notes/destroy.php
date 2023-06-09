<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_SESSION['user']['email'];

$currentUser = checkUserId($_SESSION['user']['user_id']);


$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => $currentUser
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query('update notes SET deleted_at = :deleted_at where id = :id', [
    'deleted_at' => getTime(),
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
