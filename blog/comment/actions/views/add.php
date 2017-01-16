<?php

use blog\comment\widgets\Comment;

echo Comment::widget([
    'model' => $comment,
    'postId' => $comment->post_id
]);
