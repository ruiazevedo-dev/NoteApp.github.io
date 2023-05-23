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


$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => $currentUser
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
