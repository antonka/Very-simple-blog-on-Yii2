<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


?>
<div>
    <h2>Leave a comment</h2>
    <div>
        <?php 
        
        $form = ActiveForm::begin(['action' => Url::toRoute([
            '/blog/addComment', 'post_id' => $postId
        ])]); 
        
        echo $form->errorSummary($model);
        
        if (Yii::$app->user->isGuest) {
            echo $form->field($model, 'username')->textInput([
                'style' => 'width: 250px;',
            ]);
            echo $form->field($model, 'email')->textInput([
                'style' => 'width: 250px;',
            ]);
        }
        
        echo $form->field($model, 'content')->textarea([
            'style' => 'width: 500px; height: 100px; resize: none;'
        ]);
        
        echo Html::submitButton('Add comment', ['class' => 'btn btn-primary']);
        
        ActiveForm::end(); 
        
        ?>
    </div>
</div>