<?php

$this->title = 'Edit category';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <h1>Edit category</h1>
    <div>
        <?= $this->render('_form', [
            'categoryModel' => $categoryModel
        ]); ?>
    </div>
</div>