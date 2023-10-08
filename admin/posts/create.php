<?php include("../../path.php"); ?>
<?php include(ROOT_PATH. "../../app/controllers/posts.php");
$pageTitle = "Add Post";
$submitName = "suggest-post";
$submitTitle = '';
if ($_SESSION['role'] > 1) {
    $submitTitle = "Add Post As Draft";
} else {
    $submitTitle = "Suggest Post";
}
$action = "create.php";
$publishName = "add-post";
$publishTitle = "Publish Post";
include(ROOT_PATH. "../../app/includes/adminPostCreate.php");
?>