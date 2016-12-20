<?php

namespace blog\base;

/**
 * @author Anton Karamnov
 */
abstract class Command
{
    abstract function execute();
    
    /**
     * @return string
     */
    public static function getClassName()
    {
        return get_called_class();
    }
}

