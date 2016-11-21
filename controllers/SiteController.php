<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Cookie;
use app\models\TestForm;
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie(['name'=>'language',
                                   'value'=>'fuck,world' 
                                
        ]));

        // $session['aa']=['name'=>'lin36150000','lifetime'=>5];
//         $cap = $session['aa'];
//         $cap['bb']='ccccccccccc';
//         $cap['dd'] = 'ddddd';
//         $session['aa'] = $cap;
//            $cookies = Yii::$app->request->cookies;
//            $language = $cookies->getValue('language', 'lin3615');
//            print_r($language); 
        
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

	public function actionFuck()
	{
		echo '...............';
	}
	
	public function actionDeal()
	{
        print_r(Yii::$app->request->post());
	}	
	
	/**
	 *  say-message方法
	 * @param string $message
	 * @return Ambigous <string, string>
	 */
	public function actionSayMessage($message = 'Hi,lin3615')
	{
	    return $this->render('sayMessage',['message'=> $message]);
	}
	
	/**
	 * 表单提交
	 * @return Ambigous <string, string>
	 */
	public function actionTest()
	{
	    // 头部引入这文件
	   $testForm = new TestForm();
        return $this->render('form', ['model'=>$testForm]);
	  
	}
	
	/**
	 * 获取表单提交过来的数据
	 */
	public function actionTestDeal()
	{
	    // 获取 post提交的数据
	    $testForm = new TestForm();
	    print_r($_REQUEST);
	    /*
	     * Array
            (
                [name] => bbb
                [email] => SSSS@QQ.COM
                [_csrf] => LWU1ODZVYjlJFgd/USdVaXUxBmBaYTYMajRyd2A0VGAeHABbWWcpbA==
                [submit] => 提交
            )
	     */
	}
}
