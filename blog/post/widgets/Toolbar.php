<?php

namespace blog\post\widgets;

use Yii;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Toolbar extends \yii\base\Widget
{
    /**
     * @var integer  
     */
    public $postId;
    
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
     
        return $this->render('toolbar', [
           'links' => [
                [Yii::t('post', 'Edit'), PostUrl::edit($this->postId)],
                [Yii::t('post', 'Download'), PostUrl::download($this->postId)],
                [Yii::t('post', 'Reload'), PostUrl::reload($this->postId)],
                [Yii::t('post','Delete'), PostUrl::delete($this->postId)],
            ],
        ]);
    }
}
