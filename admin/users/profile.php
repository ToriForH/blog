<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/users.php");
$submitName = "update-profile";
$submitTitle = "Update Profile Data";
$title = 'My profile';
$user = selectOne('users', ['id' => $_SESSION['id']]);
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$email = $user['email'];
$action = 'profile.php';
usersOnly();
include(ROOT_PATH . "../../app/includes/adminUserCreate.php");
?>
