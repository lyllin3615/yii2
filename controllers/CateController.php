<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Cate;
use app\models\UploadForm;
use yii\web\UploadedFile;
class CateController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionTest($id=0, $sex=null)
    {
       
        echo file_get_contents('../uploads/img.php');
        
        

        $arr = array('msg'=>date('Y-m-d H:i:s', time()));
        /*
        $query = Cate::find();

        $res = $query->all();
        print_r($res->_attributes);
        */
        $rr = Cate::findOne('12');
        echo $rr->name;
        
        // 查询
        /*
           $res = Cate::find()->oderBy('name')->all();
           $res = $query->orderBy('id')->all();
           print_r($res);
           
           // 查询返回以数组的形式返回
            $rr = $cate::findOne(1);
            print_r($rr->attributes);
         */
        // 插入记录
        /*
            $cate = new Cate();
            $cate->name = '================';
            $cate->save();
        */
        
        $cate = new Cate();
        $rr = $cate::findOne(1);
        print_r($rr->attributes);
        $rs = $cate->test();
        echo "<br />\ntest:<br />\n";
        $id = Yii::$app->request->get('id');
        $name = Yii::$app->request->get('name');
        $item = Yii::$app->request->get('item');
        echo $name,$item,$id;
        echo "<br />\n end <br />\n";
 
        return $this->render('test',$arr);
    }
    
    public function actionTestDeal()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isPost)
        {
            $model->imageFiles = UploadedFile::getInstance($model, 'imageFile');
            if($model->upload())
            {   
                echo 'success';
                return ;
            }
        }
        return $this->render('deal', ['model'=>$model]);
    }
    
    // modules
    /*
    public function actionFuck()
    {
        $article = Yii::$app->getModule('article');
        $article->runAction('default/index');
    }
    */
}