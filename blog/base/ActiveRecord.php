<?php

namespace blog\base;

use Yii;
use yii\web\HttpException;

/**
 * @author Anton Karamnov
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * @param string $queryParamName
     * @param string $attributeName 
     * @return \yii\db\ActiveRecord
     * @throws HttpException
     */
    public static function findByUrlQueryParam($queryParamName, $attributeName = 'id') 
    {
        $queryParamValue = Yii::$app->request->get($queryParamName);
        $model = self::find()->where([$attributeName => $queryParamValue])->one();
        if (is_null($model)) {
            throw new HttpException(404);
        }
        return $model;
    }
}  