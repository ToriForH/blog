<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/requests.php");
$title = "Active Requests";
$condition = ['answered' => 0];
adminsOnly();
include(ROOT_PATH . "../../app/includes/adminRequestIndex.php");
?>