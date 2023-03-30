<?php

function validateRequest($request)
{
    $errors = array();


    if(empty($request['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($request['message'])) {
        array_push($errors, 'You must write your message');
    }

    return $errors;
}