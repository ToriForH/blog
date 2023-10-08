<?php
include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
adminsOnly();
$condition = ['role' => 1];
$title = 'Manage Only Regular Users';
include(ROOT_PATH . "../../app/includes/adminUserIndex.php");
?>
