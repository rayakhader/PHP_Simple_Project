<?php

use Core\App;
use Core\Database;

// $db = App::container()->resolve(\Core\Database::class); // has connection and statement 
$db = App::resolve(Database::class); // app delegate to container to resolve

$currentUserId = 1;




$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


authorize($note['user_id'] === $currentUserId);

$db->query('Delete from notes where id= :id', [
    'id' => $_POST['id']
]);

header('Location: /notes');
exit();
