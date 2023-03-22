<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$condition = ['user_id' => $_SESSION['id']];
$title = 'Manage My Topics';
include(ROOT_PATH . "../../app/includes/adminTopicIndex.php");
?>
