<?php

use \yii\bootstrap\Html;

?>

<div>
    <div style="font-size: 16px;margin-bottom: 10px;">Categories</div>
    <div>
        <?php foreach ($categoriesList as $categoryRow): ?>
            <div><?= Html::a($categoryRow['name'], '#'); ?></div>
        <?php endforeach; ?>
    </div>
</div>
