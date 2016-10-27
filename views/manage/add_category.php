<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Add category';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <h1>Add category</h1>
    <div>
        <?php 
        $form = ActiveForm::begin();
        echo $form->field($categoryModel, 'name')->textInput([
            'style' => 'width: 250px',
        ]);
        echo Html::submitButton('Save', ['class' => 'btn btn-primary']);
        ActiveForm::end(); 
        ?>
    </div>    
</div>


