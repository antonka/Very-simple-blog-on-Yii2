<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('user', 'Changing profile');
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
    <h1><?= $this->title ?></h1>
    <div>
        <?php 
        $form = ActiveForm::begin();
        echo $form->field($userModel, 'name')->textInput([
            'style' => 'width: 250px',
        ]);
        echo $form->field($userModel, 'email')->textInput([
            'style' => 'width: 250px',
        ]);
        echo Html::submitButton(Yii::t('user', 'Change'), ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
        ?>
    </div>    
</div>

