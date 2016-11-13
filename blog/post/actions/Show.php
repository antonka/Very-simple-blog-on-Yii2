<?php

namespace blog\post\actions;

/**
 * @author Anton Karamnov
 */
class Show extends \blog\base\Action
{
    public function run() 
    {
        return $this->render('show', [
            'post' => \blog\post\Finder::findByHttpRequest()
        ]);
    }
}
