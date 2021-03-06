<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
    <h1><?= $this->title ?></h1>
    <div>
        <?php 
        $form = ActiveForm::begin();
        echo $form->field($loginForm, 'email')->textInput([
            'style' => 'width: 250px;',
        ]);
        echo $form->field($loginForm, 'password')->passwordInput([
            'style' => 'width: 250px;',
        ]);
        echo Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
        ?>
    </div>    
</div>




   