<?php

include(ROOT_PATH. "../../app/database/db.php");
include(ROOT_PATH. "../../app/controllers/requests.php");
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