<?php

function validateUser($user)
{
    $errors = array();

        if(empty($user['username'])) {
            array_push($errors, 'Username is required');
        }

        $existingUsername = selectOne('users', ['username' => $user['username']]);
        if ($existingUsername  && $existingUsername['id'] != $user['id']) {
            array_push($errors, 'This username already exists');
        }

        if(empty($user['email'])) {
            array_push($errors, 'Email is required');
        }

        $existingUserEmail = selectOne('users', ['email' => $user['email']]);
        if ($existingUserEmail && $existingUserEmail['id'] != $user['id']) {
            array_push($errors, 'User with this email already exists');
        }

        $existingUser = selectOne('users', ['id' => $user['id']]);
        if(empty($user['password']) && !$existingUser) {
            array_push($errors, 'Password is required');
        }

        if($user['password'] != $_POST['passwordConf']) {
            array_push($errors, 'Password do not match');
        }

    return $errors;
}



function validateLogin($user)
{
    $errors = array();

        if(empty($user['username'])) {
            array_push($errors, 'Username is required');
        }

        if(empty($user['password'])) {
            array_push($errors, 'Password is required');
        }

    return $errors;
}