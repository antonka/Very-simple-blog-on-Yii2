<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\base\traits\AuthenticatedAccess;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

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
    
    /**
     * @return string
     */
    static public function url()
    {
        return Url::toRoute(['comment/showGrid']);
    }
    
    /**
     * @return string
     */
    static public function link()
    {
        return [
            'label' => Yii::t('comment', 'List of comments'),
            'url' => self::url(),
        ];
    }
            
}

