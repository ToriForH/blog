<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/usersAdmin.php");
adminsOnly();
$condition = '';
$title = 'Manage All Users';
include(ROOT_PATH . "../../app/includes/adminUserIndex.php");
?>

