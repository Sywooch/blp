<?php

namespace app\controllers;


use yii\web\Controller;




/**
 * Контроллер для  виджета sravni.ru
 * Class WidController
 * @package app\controllers
 */

class WidController extends Controller
{
    /**
     * Экшн вывода страницы calculator-kasko
     * Экшн пустой внутри, т к виджет представляет собой JS код в теле страницы
     * @author Mihail Kriventsov <mihon_kri@rambler.ru>
     * @date 10.05.16
     * @return string
     */
    public function actionView()
    {
        return $this->render('index');

    }

    public function actionTime()
    {

       echo date('H-i-s, j-m-y', time()); 
       echo phpinfo();
       die();

    }
    public function actionTest()
    {

        return $this->render('test');

    }

    public function actionAgents()
    {

        return $this->render('agents');

    }
    public function actionAgentsentrance()
    {

        return $this->render('entrance');

    }
    public function actionRecallpassword()
    {

        return $this->render('recallpassword');

    }
    public function actionRegistuseragent()
    {

        return $this->render('registuseragent');

    }
    public function actionRegistasagent()
    {

        return $this->render('registasagent');

    }
    public function actionAgentlk()
    {

        return $this->render('agentlk');

    }
    public function actionAgentprofile()
    {

        return $this->render('agentprofile');

    }
    public function actionAgentworkreview()
    {

        return $this->render('agentworkreview');

    }
    public function actionAgentbids()
    {

        return $this->render('agentbids');

    }
    public function actionReviewunknown()
    {

        return $this->render('reviewunknown');

    }
}
