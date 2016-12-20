<?php

namespace blog\base;

/**
 * @author Anton Karamnov
 */
abstract class Command
{
    abstract function run();
    
    /**
     * @return string
     */
    public static function getClassName()
    {
        return get_called_class();
    }
}

