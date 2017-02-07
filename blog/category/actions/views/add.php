<?php

use Yii;

$this->title = 'Add category';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <h1><?= Yii::t('category', 'Add category') ?></h1>
    <div>
        <?= $this->render('_form', [
            'categoryModel' => $categoryModel
        ]); ?>
    </div>
</div>


