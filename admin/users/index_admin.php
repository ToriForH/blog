<?php
include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
adminsOnly();
$condition = ['role' => 2, 'role' => 3, 'role' => 4];
$title = 'Manage Moders and Admins';
include(ROOT_PATH . "../../app/includes/adminUserIndex.php");
?>

