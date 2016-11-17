<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<div>
    <h2>Leave a comment</h2>
    <div>
        <?php $form = ActiveForm::begin([
            'action' => Url::toRoute(['/blog/addComment']),
        ]); ?>
        <?= $form->errorSummary($commentForm) ?>
        <?= $form->field($commentForm, 'postId')->hiddenInput()->label(false); ?>
        <?php if ($commentForm->getScenario() == 'need_to_authenticate_user'): ?>
            <?= $form->field($commentForm, 'username')->textInput([
                'style' => 'width: 250px;',
            ]); ?>
            <?= $form->field($commentForm, 'email')->textInput([
                'style' => 'width: 250px;',
            ]); ?>
        <?php endif; ?>
        <?= $form->field($commentForm, 'content')->textarea([
            'style' => 'width: 500px; height: 100px; resize: none;'
        ]); ?>
        <?= Html::submitButton('Add comment', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>