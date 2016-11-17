<?php

namespace blog\comment\widgets;

use Yii;
use blog\comment\models\Comment;
use blog\comment\models\CommentForm;

/**
 * @author Anton Karamnov
 */
class CommentBox extends \yii\base\Widget
{
    public function run()
    {
        $model = Yii::$app->user->isGuest ? new CommentForm() : new Comment();
        
        return $this->render('comment_box', [
            'model' => $model,
        ]);
    }
}


