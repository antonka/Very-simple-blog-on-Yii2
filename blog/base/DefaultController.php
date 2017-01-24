<?php

namespace blog\base;

use Yii;

/**
 * @author Anton Karamnov
 */
class DefaultController extends \yii\web\Controller
{    
    /**
     * @return array
     */
    public function actions()
    {
        return [
            'showError' => [
                'class' => \yii\web\ErrorAction::className(),
                'view' => '@blog/base/actions/views/show_error.php',
            ],
        ];
    }
    
    /**
     * @param string $id the action ID.
     * @return Action the newly created action instance. Null if the ID doesn't resolve into any action.
     */
    public function createAction($id)
    {
        if ($id === '') {
            $id = $this->defaultAction;
        }
        $actionMap = $this->actions();
        
        if (isset($actionMap[$id])) {
            return Yii::createObject($actionMap[$id], [$id, $this]);
        } 
        else {
            $actionClassName = 'blog\\' . $this->id . '\\actions\\' . ucfirst($id);
            if (class_exists($actionClassName)) {
                return Yii::createObject($actionClassName, [$id, $this]);
            }
            elseif (preg_match('/^[a-z0-9\\-_]+$/', $id) && strpos($id, '--') === false && trim($id, '-') === $id) {
                $methodName = 'action' . str_replace(' ', '', ucwords(implode(' ', explode('-', $id))));
                if (method_exists($this, $methodName)) {
                    $method = new \ReflectionMethod($this, $methodName);
                    if ($method->isPublic() && $method->getName() === $methodName) {
                        return new InlineAction($id, $this, $methodName);
                    }
                }
            }
        }

        return null;
    }
}


