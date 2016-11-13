<?php

$this->title = 'Add category';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <h1>Add category</h1>
    <div>
        <?= $this->render('_form', [
            'categoryModel' => $categoryModel
        ]); ?>
    </div>
</div>


