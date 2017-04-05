<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('user', 'Changing password');
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
    <h1><?= $this->title ?></h1>
    <div>
        <?php 
        $form = ActiveForm::begin();
        echo $form->field($changePasswordForm, 'currentPassword')->passwordInput([
            'style' => 'width: 250px',
        ]);
        echo $form->field($changePasswordForm, 'newPassword')->passwordInput([
            'style' => 'width: 250px',
        ]);
        echo $form->field($changePasswordForm, 'repeatedNewPassword')->passwordInput([
            'style' => 'width: 250px',
        ]);
        echo Html::submitButton(Yii::t('user', 'Change'), ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
        ?>
    </div>    
</div>
