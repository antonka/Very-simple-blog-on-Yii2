<?php

namespace app\widgets;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostToolbar extends \yii\base\Widget
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
     
        return $this->render('post_toolbar', [
           'links' => [
                ['Reload', ['/manage/reloadPost', 'id'=>$this->postId]],
                ['Delete', '#'],
            ],
        ]);
    }
}
