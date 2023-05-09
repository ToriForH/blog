<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
$submitName = "create-user";
$submitTitle = "Add User";
$title = 'Add User';
$action = 'create.php';
adminsOnly();
include(ROOT_PATH. "../../app/includes/adminUserCreate.php");
?>