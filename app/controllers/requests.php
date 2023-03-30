<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/middleware.php");
//include(ROOT_PATH. "../../app/helpers/validateRequest.php");

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

if (isset($_POST['add-request'])) {

    if(empty($_POST['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($_POST['message'])) {
        array_push($errors, 'You must write your message');
    }

    if (count($errors) == 0) {
        unset($_POST['add-request']);
        $_POST['answered'] = 0;

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

if (isset($_GET['id'])) {
    $request = selectOne($table, ['id' => $_GET['id']]);
    $id = $request['id'];
    $email = $request['email'];
    $message = $request['message'];
    $user_id = $request['user_id'];
    $answered = $request['answered'];
}

if (isset($_GET['answered']) && isset($_GET['r_id'])) {
    adminsOnly();
    $answered = $_GET['answered'];
    $admin_id = $_SESSION['id'];
    $r_id = $_GET['r_id'];
    $count = update($table, $r_id, ['answered' => $answered, 'user_id' => $admin_id]);
    if ($_GET['answered'] == 1) {
        $_SESSION['message'] = "Request marked as answered";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['message'] = "Request marked as unanswered";
        $_SESSION['type'] = "error";
    }
    header('location: ' . BASE_URL . '/admin/requests/index.php');
    exit();
}