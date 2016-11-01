<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use yii\helpers\Url;

$actionRoute = $categoryModel->isNewRecord 
               ? ['/manage/addCategory']
               : ['/manage/editCategory', 'category_id' => $categoryModel->id];

if (Yii::$app->session->hasFlash('success')) {
    echo Yii::$app->session->getFlash('success');
}

$form = ActiveForm::begin([
    'action' => Url::toRoute($actionRoute),
    'options' => [
        'data-pjax' => true,
    ]
]);
echo $form->field($categoryModel, 'name')->textInput([
    'style' => 'width: 250px',
]);
echo Html::submitButton('Save', ['class' => 'btn btn-primary']);
ActiveForm::end(); 
