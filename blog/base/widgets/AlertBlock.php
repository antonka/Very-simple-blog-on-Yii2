<?php

namespace blog\base\widgets;

use Yii;

/**
 * @author Anton Karamnov
 */
class AlertBlock extends \yii\base\Widget
{
    public function run()
    {
        
        return $this->render('alert_block', [
            'successMessagesList' => $this->getMessagesList('success'),
            'errorMessagesList' => $this->getMessagesList('error'),
        ]);
    }
    
    /**
     * @param string $type
     * @return array
     */
    protected function getMessagesList($type)
    {
        $message = Yii::$app->session->getFlash($type);
        if (!$message) {
            return [];
        }
 
        return is_array($message) ? $message : [$message];
    }
}