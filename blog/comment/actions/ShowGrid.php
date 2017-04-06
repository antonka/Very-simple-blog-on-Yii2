<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\base\traits\AuthenticatedAccess;
use yii\data\ActiveDataProvider;

/**
 * @author Anton Karamnov
 */
class ShowGrid extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Comment::find(),
        ]);
        
        return $this->render('showGrid', [
            'dataProvider' => $dataProvider,
        ]);
    }
}

