<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    'enableClientValidation' => false,
]); 
echo $form->errorSummary($fileModel);
echo $form->errorSummary($postModel);
echo $form->field($fileModel, 'file')->fileInput();
echo Html::button(Yii::t('post', 'Load'), ['type' => 'submit']); 
ActiveForm::end(); 

