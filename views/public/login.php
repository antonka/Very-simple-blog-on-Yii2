<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


?>
<div>
    <h1>Login</h1>
    <div>
        <?php 
        $form = ActiveForm::begin();
        echo $form->field($loginForm, 'password')->passwordInput([
            'style' => 'width: 250px;',
        ]);
        echo Html::submitButton('Login', ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
        ?>
    </div>    
</div>




   