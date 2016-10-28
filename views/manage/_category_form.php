<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use yii\helpers\Url;

if (Yii::$app->session->hasFlash('success')) {
    echo Yii::$app->session->getFlash('success');
}

$form = ActiveForm::begin([
    'action' => Url::toRoute(['/manage/addCategory']),
    'options' => [
        'data-pjax' => true,
    ]
]);
echo $form->field($categoryModel, 'name')->textInput([
    'style' => 'width: 250px',
]);
echo Html::submitButton('Save', ['class' => 'btn btn-primary']);
ActiveForm::end(); 
