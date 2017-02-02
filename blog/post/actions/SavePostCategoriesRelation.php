<?php

namespace blog\post\actions;

use Yii;
use yii\web\HttpException;
use blog\post\helpers\PostUrl;
use blog\post\algorithms\PostCategoriesRelationSaveProcess;
use blog\post\models\Post;
use blog\category\models\Category;

/**
 * @author Anton Karamnov
 */
class SavePostCategoriesRelation extends \blog\base\Action
{
    /**
     * @return \yii\web\Response
     * @throws HttpException
     */
    public function run()
    {
        $post = Post::findByUrlQueryParam('post_id');
        
        $selectedCategoryIds = array_keys(
            Yii::$app->request->post('categoryIds', [])
        );
        
        $allCategoryIds = Category::getAllIds();
        if (count(array_intersect($selectedCategoryIds, $allCategoryIds))
            != count($selectedCategoryIds)
        ) {
            throw new HttpException(403, 'Invalid incoming data');
        }
        
        $process = new PostCategoriesRelationSaveProcess(
            $post, $selectedCategoryIds, $allCategoryIds);
        
        $process->execute(); 
        
        Yii::$app->session->setFlash('success', 
            Yii::t('post', 'Relations was updated'));
        
        return $this->redirect(PostUrl::show($post->id));
    }
}