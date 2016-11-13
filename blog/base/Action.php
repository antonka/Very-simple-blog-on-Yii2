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
     * @return string
     */
    public function getViewPath()
    {
        $class = new \ReflectionClass($this);
        return dirname($class->getFileName()) . '/views';
    }
}
