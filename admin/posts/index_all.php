<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/posts.php");
$title = "Manage All Posts";
$condition = '';
modersOnly();
include(ROOT_PATH . "../../app/includes/adminPostIndex.php");
?>