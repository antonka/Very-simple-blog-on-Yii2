<?php

namespace blog\comment\widgets;

use Yii;
use blog\comment\models\CommentForm;

/**
 * @author Anton Karamnov
 */
class CommentBox extends \yii\base\Widget
{
    /**
     * @var integer
     */
    public $postId;
    
    public function run()
    {
        $commentForm = new CommentForm();
        $commentForm->postId = $this->postId;
        if (Yii::$app->user->isGuest) {
            $commentForm->setScenario('need_to_authenticate_user');
        }
        
        return $this->render('comment_box', [
            'commentForm' => $commentForm,
        ]);
    }
}


