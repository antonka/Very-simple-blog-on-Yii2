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
                ['Download', PostUrl::download($this->postId)],
                ['Reload', PostUrl::reload($this->postId)],
                ['Delete', PostUrl::delete($this->postId)],
            ],
        ]);
    }
}
