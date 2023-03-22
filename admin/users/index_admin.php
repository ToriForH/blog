<?php
include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
adminsOnly();
$condition = ['moder' => 1];
$title = 'Manage Moders and Admins';
include(ROOT_PATH . "../../app/includes/adminUserIndex.php");
?>

