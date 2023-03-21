<?php
include("path.php");
include(ROOT_PATH. "app/helpers/middleware.php");
//usersOnly();
session_start();

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);
unset($_SESSION['manager']);
unset($_SESSION['message']);
unset($_SESSION['type']);

session_destroy();

header('location: ' . BASE_URL . '/index.php');