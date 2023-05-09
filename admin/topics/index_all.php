<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");
$condition = '';
$title = 'Manage All Topics';
modersOnly();
include(ROOT_PATH . "../../app/includes/adminTopicIndex.php");
?>