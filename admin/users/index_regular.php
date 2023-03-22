<?php
include("../../path.php");
include(ROOT_PATH. "../../app/controllers/usersAdmin.php");
adminsOnly();
$condition = ['moder' => 0];
$title = 'Manage Only Regular Users';
include(ROOT_PATH . "../../app/includes/adminUserIndex.php");
?>
