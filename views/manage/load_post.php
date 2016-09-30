<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?php $form = ActiveForm::begin(); ?>
           <?= $form->field($postFileModel, 'file')->fileInput(); ?>
           <?= Html::button('Load post', ['type' => 'submit']); ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>