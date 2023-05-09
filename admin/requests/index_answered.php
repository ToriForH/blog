<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/requests.php");
$title = "Answered Requests";
$condition = ['answered' => 1];
adminsOnly();
include(ROOT_PATH . "../../app/includes/adminRequestIndex.php");
?>