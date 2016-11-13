<?php

namespace blog\post\widgets;

use Yii;

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
