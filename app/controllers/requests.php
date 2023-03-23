<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/middleware.php");
include(ROOT_PATH. "../../app/helpers/validateRequest.php");

$table = 'requests';
$users = selectAll('users', ['admin' => 1]);

function requests($condition = [])
{
    $requests = selectAll('requests', $condition);
    return $requests;
}

$errors = array();
$id = '';
$email = '';
$message = '';
$answered = '';
$user_id = '';

if (isset($_POST['add-request'])) {
    $errors = validateRequest($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-request']);
        $_POST['answered'] = 0;
        $_POST['user_id'] = '';
        dd($_POST);
        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Message sent successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/index.php');
        exit();
    } else {
        $email = $_POST['email'];
        $message = $_POST['message'];
    }
}