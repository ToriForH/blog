<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/posts.php");
$title = "Manage Published Posts";
$condition = '';
if ($_SESSION['role'] > 1) {
    $condition = ['published' => 1];
} else {
    $condition = ['published' => 1, 'user_id' => $_SESSION['id']];
}
include(ROOT_PATH . "../../app/includes/adminPostIndex.php");
?>