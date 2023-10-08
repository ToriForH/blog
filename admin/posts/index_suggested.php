<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/posts.php");
$title = "Manage Suggested Posts";
$condition = '';
if ($_SESSION['role'] > 1) {
    $condition = ['published' => 0];
} else {
    $condition = ['published' => 0, 'user_id' => $_SESSION['id']];
}
include(ROOT_PATH . "../../app/includes/adminPostIndex.php");
?>