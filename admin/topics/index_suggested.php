<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$condition = ['published' => 0];
$title = 'Manage Suggested Topics';
modersOnly();
include(ROOT_PATH . "../../app/includes/adminTopicIndex.php");
?>