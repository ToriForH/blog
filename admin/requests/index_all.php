<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/requests.php");
$title = "All Requests";
$condition = '';
adminsOnly();
include(ROOT_PATH . "../../app/includes/adminRequestIndex.php");
?>