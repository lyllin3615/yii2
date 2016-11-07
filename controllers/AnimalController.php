<?php
namespace app\controllers;
use Yii;
use vendor\animal\Dog;
use yii\base\Controller;
use yii\Base\Event;

class AnimalController extends Controller{
    public function actionIndex()
    {
        $dog = new Dog();
        $dog->look();
        $dog->eat();
    }
}
