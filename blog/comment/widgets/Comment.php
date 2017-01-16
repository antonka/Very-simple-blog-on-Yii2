<?php

namespace blog\comment\widgets;

use blog\comment\models\Comment as CommentModel;
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
     * @var blog\comment\models\Comment
     */
    public $model;
    
    public function init() 
    {
        if (is_null($this->model)) {
            $this->model = new CommentModel();
        }
    }

    public function run()
    {
        return $this->render('comment', [
            'model' => $this->model,
            'postId' => $this->postId,
        ]);
    }    
}


