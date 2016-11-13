<?php

namespace blog\post\actions;

/**
 * @author Anton Karamnov
 */
class ShowList extends \yii\base\Action
{
    public function run()
    { 
        return $this->controller->render('@blog/post/views/list/show', [
            'postsListActiveDataProvider' => \blog\post\Helper::getPostsListActiveDataProvider()
        ]);
    }
}
