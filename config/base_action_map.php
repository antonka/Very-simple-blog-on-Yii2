<?php

return [
    
    /**
     * List of posts
     */
    'index' => \blog\post\actions\ShowList::className(),
    
    /**
     * Login page
     */
    'login' => ['class' => \blog\user\actions\Login::className()],
    
    /**
     * Error page
     */
    'error' => ['class' => \yii\web\ErrorAction::className()],
    
    /**
     * Post page
     */
    'post' =>  ['class'=> \blog\post\actions\Show::className()],
    
    /**
     * Load post
     */
    'loadPost' => ['class' => \blog\post\actions\Load::className()],
    
    /**
     * Reload post
     */
    'reloadPost' => ['class' => \blog\post\actions\Reload::className()],
    
    /**
     * Delete post
     */
    'deletePost' => ['class' => \blog\post\actions\Delete::className()],
    
    /**
     * Download post
     */
    'downloadPost' => ['class' => \blog\post\actions\Download::className()],
    
    /**
     * List of posts in category
     */
    'category' => ['class' => \blog\post\actions\ShowListByCategory::className()],
    
    /**
     * Add category
     */
    'addCategory' => ['class' => \blog\category\actions\Add::className()],
    
    /**
     * Delete category
     */
    'deleteCategory' => ['class' => \blog\category\actions\Delete::className()],
    
    /**
     * Edit category
     */
    'editCategory' => ['class' => \blog\category\actions\Edit::className()],
        
    /**
     * Save post categories relation
     */
    'savePostCategoriesRelation' => [
        'class' => \blog\post\actions\SavePostCategoriesRelation::className(),
    ],
    
    /**
     * Add comment
     */
    'addComment' => ['class' => \blog\comment\actions\Add::className()],
];