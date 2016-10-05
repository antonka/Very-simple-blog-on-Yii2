<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
echo $form->errorSummary($fileModel);
echo $form->field($fileModel, 'file')->fileInput();
echo Html::button('Load', ['type' => 'submit']); 
ActiveForm::end(); 

