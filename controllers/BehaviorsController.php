<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\components\MyBehaviors;
use yii\web\ForbiddenHttpException;

class BehaviorsController extends Controller {
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('Нет доступа');
                },
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['cabinet'],
                        'actions' => ['cabinet','mydata'],
                        'roles' => ['company','user']
                    ],
                ]
            ],
        ];
    }
}