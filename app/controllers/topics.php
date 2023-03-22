<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/middleware.php");
include(ROOT_PATH. "../../app/helpers/validateTopic.php");

$table = 'topics';

function topics($condition = [])
{
    $topics = selectAll('topics', $condition);
    return $topics;
}

$users = selectAll('users');

$errors = array();
$id = '';
$name = '';
$description = '';
$published = '';


if (isset($_GET['published']) && isset($_GET['p_id'])) {
    modersOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "Topic published successfully";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/topics/index_all.php');
    exit();
}


if (isset($_POST['add-topic'])) {
    if (!$_SESSION['moder']) {
        modersOnly();
    }
    $errors = validateTopic($_POST);
    if (count($errors) == 0) {
        unset($_POST['add-topic'], $_POST['suggest-topic']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = '1';
        $_SESSION['message'] = 'Topic created and published successfully';
        $topic_id = create('topics', $_POST);
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index_all.php');
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

if (isset($_POST['suggest-topic'])) {
    $errors = validateTopic($_POST);
    if (count($errors) == 0) {
        unset($_POST['suggest-topic']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = '0';
        if ($_SESSION['moder']) {
            $_SESSION['message'] = 'Topic draft saved successfully';
        } else {
            $_SESSION['message'] = 'Topic suggested successfully. Please, wait for confirmation from admin';
        }
        $topic_id = create('topics', $_POST);
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topicToUp = selectOne($table, ['id' => $id]);
    if ($topicToUp['user_id'] != $_SESSION['id'] && !$_SESSION['moder']) {
        modersOnly();
    }
    $topic = selectOne($table, ['id' => $id]);
    $name = $topic['name'];
    $description = $topic['description'];
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $topicToDel = selectOne($table, ['id' => $id]);
    if ($topicToDel['user_id'] != $_SESSION['id'] && !$_SESSION['moder']) {
        modersOnly();
    }
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
            $_SESSION['message'] = 'Update is accepted. Please, wait for confirmation from admin';
        } else {
            $_SESSION['message'] = 'Topic updated successfully';
        }
        $topic_id = update($table, $id, $_POST);
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}