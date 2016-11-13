<?php

namespace blog\post\actions;

/**
 * @author Anton Karamnov
 */
class ShowList extends \blog\base\Action 
{
    public function run()
    { 
        return $this->render('list/show', [
            'postsListActiveDataProvider' => \blog\post\Helper::getPostsListActiveDataProvider()
        ]);
    }
}
