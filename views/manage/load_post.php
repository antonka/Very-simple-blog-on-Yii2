<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
           <?= $form->errorSummary($fileModel); ?>
           <?= $form->field($fileModel, 'file')->fileInput(); ?>
           <?= Html::button('Load', ['type' => 'submit']); ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>