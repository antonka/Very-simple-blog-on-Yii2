<?php

namespace blog\base;

/**
 * @author Anton Karamnov
 */
class MarkDownFileLoaderFactory
{
    /**
     * @return \app\helpers\FileLoader
     */
    public static function build()
    {
        return new FileLoader(new models\MarkDownFile());
    }
}