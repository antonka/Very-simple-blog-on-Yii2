<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use blog\category\models\Category;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    'enableClientValidation' => false,
]); 

echo $form->errorSummary($fileModel);
echo $form->errorSummary($postModel);
echo $form->field($fileModel, 'file')->fileInput();
echo $form->field($postModel, 'slug')->textInput();
echo $form->field($postModel, 'category_id')->dropDownList(
    ArrayHelper::map(Category::find()->all(), 'id', 'name'),
    ['style' => 'width: 250px']
);
echo Html::button(Yii::t('post', 'Load'), [
    'type' => 'submit', 
    'class' => 'btn btn-primary',
]); 
ActiveForm::end(); 

