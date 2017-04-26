<?php

use Yii;
use yii\helpers\Html;
use blog\comment\widgets\Comment;
use blog\post\helpers\PostUrl;
use yii\widgets\ActiveForm;
use blog\category\models\Category;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('post', 'Editing this post');
$this->params['breadcrumbs'] = [
    [
        'label' => $post->title, 
        'url' => PostUrl::show($post),
    ],
    Yii::t('post', 'Edit'),
];
?>

<div>
    <h1><?= $this->title ?></h1>
    <div>
        <?php
            $form = ActiveForm::begin([
                'enableClientValidation' => false,
            ]);
            echo $form->errorSummary($post);
            echo $form->field($post, 'category')->dropDownList(
                ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                ['style' => 'width: 250px']
            );
            echo $form->field($post, 'slug')->textInput();
            echo $form->field($post, 'title')->textInput();
            echo $form->field($post, 'description')->textarea([
                'style' => 'resize: none; height: 80px;'
            ]);
            echo \yii\imperavi\Widget::widget([
                'model' => $post,
                'attribute' => 'content',
                
            ]);
            echo Html::button(Yii::t('app', 'Save'), [
                'type' => 'submit',
                'class' => 'btn btn-primary',
            ]);      
            ActiveForm::end();
        ?>
    </div>
</div>
