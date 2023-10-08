<?php

function usersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You must login first';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function modersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || $_SESSION['role'] < 2) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function adminsOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || $_SESSION['role'] < 3) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function guestsOnly($redirect = '/index.php')
{
    if (isset($_SESSION['id'])) {
        $_SESSION['message'] = 'You are already logged';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}