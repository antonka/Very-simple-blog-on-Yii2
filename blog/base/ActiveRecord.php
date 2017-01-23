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
     * @return \yii\db\ActiveRecord
     * @throws HttpException
     */
    public static function findByUrlQueryParam($queryParamName) 
    {
        $queryParamValue = Yii::$app->request->get($queryParamName);
        $model = self::findOne($queryParamValue);
        if (is_null($model)) {
            throw new HttpException(404);
        }
        return $model;
    }
}  