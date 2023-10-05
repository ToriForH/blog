<?php

function validatePost($post)
{
    $errors = array();

    if(empty($post['title'])) {
        array_push($errors, 'Title is required');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost && $existingPost['id'] != $post['id']) {
        array_push($errors, 'Post with this title already exists');
    }

    if(empty($post['body'])) {
        array_push($errors, 'Body is required');
    }

    if(empty($post['topic_ids'])) {
        array_push($errors, 'You must select at least one topic');
    }

    return $errors;
}