<?php

namespace app\helpers;

/**
 * @author Anton Karamnov
 */
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