<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;

$form = ActiveForm::begin([
    'options' => [
        'data-pjax' => true,
    ]
]);

echo $form->field($categoryModel, 'name')->textInput([
    'style' => 'width: 250px',
]);

echo $form->field($categoryModel, 'slug')->textInput([
    'style' => 'width: 250px',
]);

echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']);
ActiveForm::end(); 
