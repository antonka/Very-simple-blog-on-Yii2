<?php

namespace app\helpers;

class PostFactory
{
    public static function build()
    {
        return new Post(
            new \app\models\Post(),
            MarkDownFileLoaderFactory::build()
        );
    }
}