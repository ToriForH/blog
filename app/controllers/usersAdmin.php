<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/middleware.php");
include(ROOT_PATH. "../../app/helpers/validateUser.php");

$table = 'users';
function users($condition = [])
{
    $users = selectAll('users', $condition);
    return $users;
}

$errors = array();
$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$role = '';
$admin = '';
$moder = '';

if (isset($_POST['create-user'])) {
    $errors = validateUser($_POST);

    if (empty($_POST['role'])) {
        array_push($errors, "You must choose a role");
    }

    if(count($errors) == 0) {
        $_POST['admin'] = 0;
        if ($_POST['role'] == 'User') {
            $_POST['moder'] = 0;
        } else {
            $_POST['moder'] = 1;
        }
        if ($_POST['role'] == 'Admin') {
            $_POST['admin'] = 1;
        }
        unset($_POST['create-user'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $_SESSION['message'] = "User created successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = selectOne($table, ['id' => $_GET['id']]);
    $username = $user['username'];
    $email = $user['email'];
    $role = $user['role'];
}

if (isset($_GET['delete_id'])) {
    if ($_GET['delete_id'] == 1) {
        $_SESSION['message'] = "You can't delete a superadmin";
        $_SESSION['type'] = "error";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $count = delete($table, $_GET['delete_id']);
        $_SESSION['message'] = "User deleted successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    }
}

if (isset($_POST['update-user'])) {
    $errors = validateUser($_POST);

    if (empty($_POST['role'])) {
        array_push($errors, "You must choose a role");
    }

    if(count($errors) == 0) {
        $id = $_POST['id'];
        $_POST['admin'] = 0;
        if ($_POST['role'] == 'User') {
            $_POST['moder'] = 0;
        } else {
            $_POST['moder'] = 1;
        }
        if ($_POST['role'] == 'Admin') {
            $_POST['admin'] = 1;
        }
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
        if (empty($_POST['password'])) {
            unset($_POST['password']);
        } else {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = "User updated successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
    }
}
