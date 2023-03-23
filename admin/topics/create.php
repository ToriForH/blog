<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$submitName = "suggest-topic";
$submitTitle = '';
if ($_SESSION['moder']) {
    $submitTitle = "Add Topic As Draft";
} else {
    $submitTitle = "Suggest Topic";
}
$title = "Add Topic";
$action = 'create.php';
$publishName = "add-topic";
include(ROOT_PATH. "../../app/includes/adminTopicCreate.php");
?>

