<?php

namespace blog\comment\helpers;

use Yii;
use blog\comment\helpers\CommentUrl;

/**
 * @author Anton Karamnov
 */
class CommentLink
{
    /**
     * @return array
     */
    public static function showGrid()
    {
        return [
            'label' => Yii::t('comment', 'Comments'),
            'url' => CommentUrl::showGrid(),
        ];
    }
}
