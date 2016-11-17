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
    
    /**
     * @var blog\comment\models\CommentForm
     */
    public $commentForm;
    
    public function run()
    {
        return $this->render('comment_box', [
            'commentForm' => $this->getCommentForm(),
        ]);
    }
    
    /**
     * @var blog\comment\models\CommentForm
     */
    protected function getCommentForm()
    {
        if ($this->commentForm) {
            return $this->commentForm;
        }
        
        $commentForm = new CommentForm();
        $commentForm->postId = $this->postId;
        if (Yii::$app->user->isGuest) {
            $commentForm->setScenario('need_to_authenticate_user');
        }
        
        return $commentForm;
    }
    
}


