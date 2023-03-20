<?php

function validatePost($post)
{
    $errors = array();

    if(empty($post['title'])) {
        array_push($errors, 'Title is required');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost && $existingPost['title'] != $post['title']) {
        array_push($errors, 'Post with this title already exists');
    }

    if(empty($post['body'])) {
        array_push($errors, 'Body is required');
    }

    if(empty($post['topic_id'])) {
        array_push($errors, 'You must select a topic');
    }

    return $errors;
}