<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * Контроллер раздела компании
 */
class AddfeedbackController extends Controller
{
    /**
     * Действие добавления фидбека (заглушка)
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionAdd()
    {
        $this->render('success', []);
    }
}