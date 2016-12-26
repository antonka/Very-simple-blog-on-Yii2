<?php

namespace blog\comment\widgets;

use blog\comment\CommentFormFactory as CommentFormFactory;
use Yii;


/**
 * @author Anton Karamnov
 */
class Comment extends \yii\base\Widget
{
    /**
     * @var integer
     */
    public $postId;
    
    /**
     * @var blog\comment\models\CommentForm
     */
    public $commentForm;
    
    public function init() 
    {
        if (is_null($this->commentForm)) {
            $this->commentForm = CommentFormFactory::getCommentForm();
        }
        
        if (!empty($this->postId)) {
            $this->commentForm->postId = $this->postId;
        }
    }

    public function run()
    {
        return $this->render('comment', [
            'commentForm' => $this->commentForm,
        ]);
    }    
}


