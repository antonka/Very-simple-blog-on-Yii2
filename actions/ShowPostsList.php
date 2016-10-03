<?php

namespace app\actions;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * @author Anton Karamnov
 */
class ShowPostsList extends \yii\base\Action
{
    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->orderBy('created_at DESC'),
            'pagination' => ['pageSize' => 10],
        ]);
        
        return $this->controller->render('post_list.php', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
