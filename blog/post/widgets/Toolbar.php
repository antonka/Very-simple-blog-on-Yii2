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
                [Yii::t('post', 'Download'), PostUrl::download($this->post->id)],
                [Yii::t('post', 'Reload'), PostUrl::reload($this->post->id)],
                [Yii::t('post','Delete'), PostUrl::delete($this->post->id)],
            ],
        ]);
    }
}
