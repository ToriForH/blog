<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/posts.php");
$title = "Manage My Posts";
$condition = ['user_id' => $_SESSION['id']];
include(ROOT_PATH . "../../app/includes/adminPostIndex.php");
?>