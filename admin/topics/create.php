<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$submitName = "suggest-topic";
$submitTitle = '';
if ($_SESSION['role'] > 1) {
    $submitTitle = "Add Topic As Draft";
} else {
    $submitTitle = "Suggest Topic";
}
$title = "Add Topic";
$action = 'create.php';
$publishName = "add-topic";
$publishTitle = "Publish Topic";
include(ROOT_PATH. "../../app/includes/adminTopicCreate.php");
?>

