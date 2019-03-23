<?php


namespace dev\controllers;

use dev\models\LoginForm;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;
use yii\web\Response;
use Yii;

class SiteController extends Controller
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'maxLength' => 4,
                'minLength' => 3,
                'width' => 100,
                'height' => 32,
                'offset' => 2,
            ],
        ]);
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception->statusCode === 404) {
            return 'no found';
        }
    }

    public function actionIndex(){
    }


}