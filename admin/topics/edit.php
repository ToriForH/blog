<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$submitName = 'update-topic';
$submitTitle = '';
if ($_SESSION['moder']) {
    $submitTitle = "Draft Updated Topic";
} else {
    $submitTitle = "Suggest Updated Topic";
}
$title = "Edit Topic";
$action = 'edit.php';
$publishName = "publish-updated-topic";
include(ROOT_PATH. "../../app/includes/adminTopicCreate.php");
?>
