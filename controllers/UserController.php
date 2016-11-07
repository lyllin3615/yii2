<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
class UserController extends Controller
{
    public function actionT()
    {
        echo '.....';
        var_dump(get_called_class());
    }
}