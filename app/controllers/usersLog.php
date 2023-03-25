<?php

include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/helpers/middleware.php");
include(ROOT_PATH. "app/helpers/validateUser.php");

$table = 'users';

$errors = array();
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$role = '';

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['moder'] = $user['moder'];
    $_SESSION['message'] = 'You are logged in successfully';
    $_SESSION['type'] = 'success';

    if($_SESSION['moder']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();
}


if (isset($_POST['register-btn'])) {
    $errors = validateUser($_POST);

    if(count($errors) == 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0;
        $_POST['moder'] = 0;
        $_POST['role'] = 'User';
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        loginUser($user);
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
}


if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) == 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errors, 'Wrong password or username');
        }
    }
}
