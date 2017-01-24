<?php

namespace blog\base;

/**
 * @author Anton Karamnov
 */
class Action extends \yii\base\Action implements \yii\base\ViewContextInterface
{
    /**
     * @param string $view
     * @param array $params
     */
    protected function render($view, array $params = [])
    { 
        return $this->controller->renderContent(
            $this->controller->getView()->render($view, $params, $this)
        );
    }
    
    /**
     * @param string $url
     * @param integer $statusCode
     * @return \yii\web\Response
     */
    protected function redirect($url, $statusCode = 302)
    {
        return $this->controller->redirect($url, $statusCode);
    }

    /**
     * @return string
     */
    public function getViewPath()
    {
        $class = new \ReflectionClass($this);
        return dirname($class->getFileName()) . '/views';
    }
}
