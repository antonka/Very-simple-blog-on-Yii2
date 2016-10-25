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
                [
                    'Download', 
                    ['/manage/downloadPost', 'post_id' => $this->postId]
                ], 
                ['Reload', ['/manage/reloadPost', 'post_id' => $this->postId]],
                ['Delete', ['/manage/deletePost', 'post_id' => $this->postId]],
            ],
        ]);
    }
}
