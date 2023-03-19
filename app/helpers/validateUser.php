<?php

function validateUser($user)
{
    $errors = array();

        if(empty($user['username'])) {
            array_push($errors, 'Username is required');
        }

        $existingUsername = selectOne('users', ['username' => $user['username']]);
        if (isset($existingUsername)) {
            array_push($errors, 'This username already exists');
        }

        if(empty($user['email'])) {
            array_push($errors, 'Email is required');
        }

        $existingUser = selectOne('users', ['email' => $user['email']]);
        if (isset($existingUser)) {
            array_push($errors, 'User with this email already exists');
        }

        if(empty($user['password'])) {
            array_push($errors, 'Password is required');
        }

        if($user['password'] != $_POST['passwordConf']) {
            array_push($errors, 'Password do not match');
        }

    return $errors;
}