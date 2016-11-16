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
                    ['/blog/downloadPost', 'post_id' => $this->postId]
                ], 
                ['Reload', ['/blog/reloadPost', 'post_id' => $this->postId]],
                ['Delete', ['/blog/deletePost', 'post_id' => $this->postId]],
            ],
        ]);
    }
}
