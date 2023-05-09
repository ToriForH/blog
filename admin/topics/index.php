<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$condition = ['published' => 1];
$title = 'Published Topics';
include(ROOT_PATH . "../../app/includes/adminTopicIndex.php");
?>
