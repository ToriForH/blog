<?php include("../../path.php");
include(ROOT_PATH. "../../app/controllers/usersAdmin.php");
$submitName = "create-user";
$submitTitle = "Add User";
$title = 'Add User';
adminsOnly();
include(ROOT_PATH. "../../app/includes/adminUserCreate.php");
?>