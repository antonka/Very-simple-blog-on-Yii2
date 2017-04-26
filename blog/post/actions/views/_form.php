<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use blog\category\models\Category;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    'enableClientValidation' => false,
]); 
;
echo $form->errorSummary($uploadPostForm);
echo $form->field($uploadPostForm, 'file')->fileInput();
echo $form->field($uploadPostForm, 'slug')->textInput();
echo $form->field($uploadPostForm, 'description')->textarea([
    'style' => 'resize: none; height: 80px;'
]);
echo $form->field($uploadPostForm, 'category_id')->dropDownList(
    ArrayHelper::map(Category::find()->all(), 'id', 'name'),
    ['style' => 'width: 250px']
);
echo Html::button(Yii::t('post', 'Load'), [
    'type' => 'submit', 
    'class' => 'btn btn-primary',
]); 
ActiveForm::end(); 

