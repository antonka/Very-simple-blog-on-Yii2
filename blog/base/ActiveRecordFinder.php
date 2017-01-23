<?php

namespace blog\base;

use Yii;
use yii\web\HttpException;

/**
 * @author Anton Karamnov
 */
class ActiveRecordFinder
{
    /**
     * @param string $queryParamName
     * @param string $modelClassName
     * @return \yii\db\ActiveRecord
     * @throws HttpException
     */
    public static function findBySingleUrlQueryParam(
        $queryParamName, $modelClassName
    ) {
        $queryParamValue = Yii::$app->request->get($queryParamName);
        $model = $modelClassName::findOne($queryParamValue);
        if (is_null($model)) {
            throw new HttpException(404);
        }
        return $model;
    }
}  