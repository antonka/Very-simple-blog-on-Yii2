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
     * @var blog\post\models\Post;  
     */
    public $post;
    
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
     
        return $this->render('toolbar', [
           'links' => [
                [Yii::t('post', 'Edit'), PostUrl::edit($this->post->id)],
                [Yii::t('post', 'Download'), \blog\post\actions\Download::url($this->post)],
                [Yii::t('post', 'Reload'), \blog\post\actions\Reload::url($this->post)],
                [Yii::t('post','Delete'), \blog\post\actions\Delete::url($this->post)],
            ],
        ]);
    }
}
