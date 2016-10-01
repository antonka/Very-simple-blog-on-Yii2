<?php

namespace app\helpers;

class PostLoaderFactory
{
    public static function build()
    {
        return new PostLoader(
            new \app\models\Post(),
            MarkDownFileLoaderFactory::build()
        );
    }
}