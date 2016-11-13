<?php

namespace blog\post\actions;

use blog\post\Finder;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Delete extends \yii\base\Action
{
    public function run()
    {
        Finder::findByHttpRequest()->delete();
        Helper::redirectToPostListPage();
    }
}
