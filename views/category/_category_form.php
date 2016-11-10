<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'options' => [
        'data-pjax' => true,
    ]
]);

echo $form->field($categoryModel, 'name')->textInput([
    'style' => 'width: 250px',
]);

echo Html::submitButton('Save', ['class' => 'btn btn-primary']);
ActiveForm::end(); 
