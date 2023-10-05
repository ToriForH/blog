<?php include("../../path.php"); ?>
<?php include(ROOT_PATH. "../../app/controllers/posts.php");
$pageTitle = "Add Post";
$submitName = "suggest-post";
$submitTitle = '';
if ($_SESSION['moder']) {
    $submitTitle = "Add Post As Draft";
    $publishTitle = "Publish Post";
} else {
    $submitTitle = "Suggest Post";
}
$action = "create.php";
$publishName = "add-post";
include(ROOT_PATH. "../../app/includes/adminPostCreate.php");
?>