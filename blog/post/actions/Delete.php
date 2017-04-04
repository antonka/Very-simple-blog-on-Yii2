<?php

namespace blog\post\actions;

use blog\base\traits\AuthenticatedAccess;
use blog\post\models\Post;
use blog\post\helpers\PostUrl;
use Yii;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    /**
     * @return \yii\web\Responce
     */
    public function run()
    {
        Post::findByUrlQueryParam('post_id')->delete();
        Yii::$app->session->setFlash('success', 
            Yii::t('post', 'This post was removed'));
        return $this->redirect(PostUrl::showList());
    }
}
