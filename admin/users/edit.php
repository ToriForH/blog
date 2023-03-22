<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
$submitName = "update-user";
$submitTitle = "Update User";
$title = 'Edit User';
adminsOnly();
include(ROOT_PATH. "../../app/includes/adminUserCreate.php");
?>
