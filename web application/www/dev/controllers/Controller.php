<?php

namespace dev\controllers;


use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }


}