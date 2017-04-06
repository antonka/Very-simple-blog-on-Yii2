<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use blog\comment\helpers\CommentUrl;

$this->title = Yii::t('comment', 'Comments');
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
    <h1><?= $this->title ?></h1>
    <div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'username',
                'created_at',
                'status',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            return CommentUrl::show($model);
                        }
                    },
                ],
            ],
        ]); ?>
    </div>    
</div>

