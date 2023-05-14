<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/helpers/middleware.php");
include(ROOT_PATH. "../../app/helpers/validatePost.php");

$table = 'posts';

function posts($condition = [])
{
    $posts = selectAll('posts', $condition);
    return $posts;
}

$topics = selectAll('topics', ['published' => 1]);
$users = selectAll('users');

$errors = array();
$id = '';
$title = '';
$body = '';
$topic = '';
$published = '';

if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);
    $id = $post['id'];
    if ($post['user_id'] != $_SESSION['id'] && !$_SESSION['moder']) {
        modersOnly();
    }
    $title = $post['title'];
    $body = $post['body'];
    $topic = $post['topic'];
    $published = $post['published'];
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $postToDel = selectOne($table, ['id' => $id]);
    if ($postToDel['user_id'] != $_SESSION['id'] && !$_SESSION['moder']) {
        modersOnly();
    }
    $count = delete($table, $id);
    $_SESSION['message'] = "Post deleted successfully";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    modersOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "Post published state changed successfully";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/posts/index_all.php');
    exit();
}

if (isset($_POST['add-post'])) {
    if (!$_SESSION['moder']) {
        modersOnly();
    }
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . '../../assets/images/' . $image_name;

        $result = move_uploaded_file(($_FILES['image']['tmp_name']),  $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "You must upload an image");
    }

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = 1;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Post published successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic = $_POST['topic'];
    }
}

if (isset($_POST['suggest-post'])) {
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . '../../assets/images/' . $image_name;

        $result = move_uploaded_file(($_FILES['image']['tmp_name']),  $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "You must upload an image");
    }

    if (count($errors) == 0) {
        unset($_POST['suggest-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = 0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);
        if ($_SESSION['moder']) {
            $_SESSION['message'] = "Post draft saved successfully";
        } else {
            $_SESSION['message'] = "Post suggested successfully. Please, wait for confirmation from admin";
        }
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic = $_POST['topic'];
    }
}

if (isset($_POST['publish-updated-post'])) {
    if (!$_SESSION['moder']) {
        modersOnly();
    }
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . '../../assets/images/' . $image_name;

        $result = move_uploaded_file(($_FILES['image']['tmp_name']),  $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['publish-updated-post'], $_POST['id']);
        $_POST['published'] = 1;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Updated post published successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic = $_POST['topic'];
    }
}

if (isset($_POST['update-post'])) {
    $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . '../../assets/images/' . $image_name;

        $result = move_uploaded_file(($_FILES['image']['tmp_name']),  $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        unset($_POST['image']);
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['published'] = 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table, $id, $_POST);
        if ($_SESSION['moder']) {
            $_SESSION['message'] = "Post draft updated successfully";
        } else {
            $_SESSION['message'] = "Update saved. Please, wait for confirmation from admin";
        }
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic = $_POST['topic'];
    }
}

if(isset($_POST['search-term'])) {
    header('location: ' . BASE_URL . '/index.php?search-term=' . $_POST['search-term'] . '&page=1');
    exit();
}