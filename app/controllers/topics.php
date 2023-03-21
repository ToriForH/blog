<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/validateTopic.php");

$table = 'topics';

$users = selectAll('users');

$errors = array();
$id = '';
$name = '';
$description = '';
$published = '';

$topics = selectAll($table);

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "Topic published successfully";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}

if (isset($_POST['add-topic']) || isset($_POST['suggest-topic'])) {
    $errors = validateTopic($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-topic'], $_POST['suggest-topic']);
        $_POST['user_id'] = $_SESSION['id'];
        if ($_SESSION['role'] = 'User') {
            $_POST['published'] = '0';
        } else {
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        }
        $topic_id = create('topics', $_POST);
        $_SESSION['type'] = 'success';
        if ($_SESSION['role'] = 'User') {
            $_SESSION['message'] = 'Topic suggested successfully. Please, wait for confirm from admin';
            header('location: ' . BASE_URL . '/admin/topics/topicIndex.php');
        } else {
            $_SESSION['message'] = 'Topic created successfully';
            header('location: ' . BASE_URL . '/admin/topics/index.php');
        }
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $name = $topic['name'];
    $description = $topic['description'];
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}

if (isset($_POST['update-topic'])) {
    $errors = validateTopic($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-topic'], $_POST['id']);
        if ($_SESSION['role'] == 'User') {
            $_POST['published'] = '0';
        }
        $topic_id = update($table, $id, $_POST);
        $_SESSION['type'] = 'success';
        if ($_SESSION['role'] == 'User') {
            $_SESSION['message'] = 'Update is accepted. Please, wait for confirmation from admin';
            header('location: ' . BASE_URL . '/admin/topics/topicIndex.php');
            exit();
        } else {
            $_SESSION['message'] = 'Topic updated successfully';
            header('location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        }
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}