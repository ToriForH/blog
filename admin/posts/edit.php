<?php include("../../path.php"); ?>
<?php include(ROOT_PATH. "../../app/controllers/posts.php");
$pageTitle = "Edit Post";
$submitName = "update-post";
$submitTitle = '';
if ($_SESSION['moder']) {
    $submitTitle = "Draft Updated Post";
} else {
    $submitTitle = "Suggest Updated Post";
}
$action = "edit.php";
$publishName = "publish-updated-post";
include(ROOT_PATH. "../../app/includes/adminPostCreate.php");
?>