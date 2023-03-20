<?php

function validateTopic($topic)
{
    $errors = array();

    if(empty($topic['name'])) {
        array_push($errors, 'Name is required');
    }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic && $existingTopic['id'] != $topic['id']) {
        array_push($errors, 'This topic already exists');
    }


    return $errors;
}