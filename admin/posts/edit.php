<?php include("../../path.php"); ?>
<?php include(ROOT_PATH. "../../app/controllers/posts.php");
$pageTitle = "Edit Post";
$submitName = "update-post";
$submitTitle = '';
if ($_SESSION['role'] > 1) {
    $submitTitle = "Draft Updated Post";
} else {
    $submitTitle = "Suggest Updated Post";
}
$action = "edit.php";
$publishName = "publish-updated-post";
$publishTitle = "Publish Updates";
$image = getValue('posts', $_GET['id'], 'image');
include(ROOT_PATH. "../../app/includes/adminPostCreate.php");
?>