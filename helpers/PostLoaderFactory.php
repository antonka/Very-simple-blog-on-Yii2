<?php

namespace app\helpers;

use app\models\PostFile;

/**
 * @author Anton Karamnov
 */
class PostLoaderFactory
{
    
    public static function build()
    {
        return new PostLoader(new PostFile);
    }
}