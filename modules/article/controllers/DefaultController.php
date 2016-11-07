<?php

namespace app\modules\article\controllers;
use Yii;
use yii\web\Controller;
use app\modules\article\models\Cate;

/**
 * Default controller for the `article` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
		$cate = new Cate();
		$rs = $cate->test();
		print_r($rs);
		$id = Yii::$app->request->get('id');
		$name = Yii::$app->request->get('name');
		// echo $id, $name;
		echo __FILE__;

        return $this->render('index');
    }
}
