<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/posts.php");
$pageTitle = "Add Post";
$submitName = "suggest-post";
$submitTitle = '';
if ($_SESSION['moder']) {
    $submitTitle = "Add Post As Draft";
} else {
    $submitTitle = "Suggest Post";
}
include(ROOT_PATH. "../../app/includes/adminPostCreate.php");
?>