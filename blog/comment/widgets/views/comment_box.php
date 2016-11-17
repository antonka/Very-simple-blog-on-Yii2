<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div>
    <h2>Leave a comment</h2>
    <div>
        <?php $form = ActiveForm::begin(); ?>
        <?php if ($model instanceof \blog\comment\models\CommentForm): ?>
            <?= $form->field($model, 'username')->textInput([
                'style' => 'width: 250px;',
            ]); ?>
            <?= $form->field($model, 'email')->textInput([
                'style' => 'width: 250px;',
            ]); ?>
        <?php endif; ?>
        <?= $form->field($model, 'content')->textarea([
            'style' => 'width: 500px; height: 100px; resize: none;'
        ]); ?>
        <?= Html::submitButton('Add comment', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>