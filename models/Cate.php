<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
class Cate extends ActiveRecord
{
    public static function tableName()
    {
        return 'cate_new';
    }
    
    public static function test()
    {
        /*
       // 通用执行
        // vedor/yiisoft/yii2/db/Command.php
        $db = Yii::$app->db;
        $res = $db->createCommand("select * from cate_new")->queryAll(\PDO::FETCH_ASSOC); // \PDO::FETCH_ASSOC | \PDO::FETCH_COLUMN
        print_r($res);
        */
        // tp用法
        /*
        $rr = self::findOne('13');
        echo $rr->name;
        */
        /*
        // 单表查询
        $post = Yii::$app->db->createCommand("select * from cate")->queryAll(\PDO::FETCH_ASSOC);
        print_r($post);
        
        // 多表查询
        $post = Yii::$app->db->createCommand("select * from cate,sz_cate where cate.id = sz_cate.id")->queryAll(\PDO::FETCH_ASSOC);
        print_r( $post);
        
        // 查询单条数据
        $post = Yii::$app->db->createCommand("select * from sz_cate")->queryOne(\PDO::FETCH_ASSOC);
        print_r($post);
        
        // 查询单列
        $post = Yii::$app->db->createCommand("select cate from sz_cate limit 1")->queryColumn();
        print_r($post);
        
        // 获取总数
        $post = Yii::$app->db->createCommand("select count(*)  from sz_cate")->queryScalar();
        print_r($post);
        
        // 根据条件查询
        $post = Yii::$app->db->createCommand("select * from cate where id=:id and name=:name")
        ->bindValue(":id", 11)
        ->bindValue(":name",'ln00')
        ->queryOne();
        
        // 根据条件查询
         $params = [':id'=>11,':name'=>'ln00'];
         $post = Yii::$app->db->createCommand("select * from cate where id = :id and name=:name")
                    ->bindValues($params)
                    ->queryAll(\PDO::FETCH_ASSOC);
         print_r($post);
         
        // 根据条件查询
        $param = [':field'=>13];
        $post = Yii::$app->db->createCommand("select * from cate where id=:field",$param)->queryOne();
        print_r($post);
        
        
         // 根据条件查询
        $command = Yii::$app->db->createCommand("select * from cate where id=:id")
                    ->bindParam(':id',$id);
        $id = 13;
        $post = $command->queryOne();
        print_r($post);
        
        $id = 1;
        $pp = $command->queryOne();
        print_r($pp);
        
        // 插入更新之类操作
        $status = Yii::$app->db->createCommand("update cate set name='lin3615' where id = 1111")->execute();
        var_dump($status);
        
        // 插入方法
        $status = Yii::$app->db->createCommand()->insert('cate',['name'=>'lin361500', 'time'=>time()])->execute();
        var_dump($status);
        
        // 更新操作
        $status = Yii::$app->db->createCommand()->update('cate',['name'=>'li'],'id=16')->execute();
        var_dump($status);
        
        // 批量插入
        $status = Yii::$app->db->createCommand()
            ->batchInsert('cate',['name','time'],
                [['aaa',time()],['bb',time()-3600],['ccc',time()-7200]])->execute();
        var_dump($status);
            
        //  事务操作,不能传递参数
        $status = Yii::$app->db->transaction(function($db){
        $sql1 = "insert into cate_new(name) values('lin3615')";
        $sql2 = "update cate set name='lyl0000' where id = 15";
        $db->createCommand($sql1)->execute();
        $db->createCommand($sql2)->execute();
        });
        
        // 事务操作，可传递参数
        $name = 'lin3615';
        $id = 15;
        $sql1 = "insert into cate_new(id,name) values('16',".$name."')";
        $sql2 = "update cate set name='lyl0000---' where id = '".$id."'";
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql2)->execute();
            $transaction->commit();
        }catch(\Exception $e)
        {
            $transaction->rollBack();
            throw $e;
        }  
        
        // 注入之容器     
        namespace app\controllers;
        use yii\di\container;
        class FuckController extends Controller
        {
            function indexAction()
            {
            	$container = new Container();
            	// 由于 driver是接口，不能直接实现，所以作影射，作为子类实现，这样设置 set方法
            	// $container->set("app\controllers\Driver", 'app\controllers\manDriver');
            	$car = $container->get('app\controllers\Car');
            	$car->run();
        	}
        }
        
        interface Driver
        {
        	function drive();
        }
        class ManDriver implements Driver
        {
        	function drive()
        	{
        		echo __FILE__;
        	}
        }
        
        class Car
        {
        	private $driver = null;
        	function __construct(Driver $driver)
        	{
        		$this->driver = $driver;
        	}
        	function run()
        	{
        		$this->driver->drive();
        	}
        } 
        
        // 注入之服务定位器
        namespace app\controllers;
        use Yii;
        use yii\di\Container;
        use yii\di\ServiceLocator;
        
        
        class testController extends Controller
        {
        	public function actionIndex()
        	{
        		//  设置对应关系
        		Yii::$container->set('app\controllers\Driver', 'app\controllers\ManDriver');
        		$sl = new ServiceLocator;
        		$sl->set('car', [
        				'class'=>'app\controllers\Car'
        			]);
        		$car = $sl->get('car');
        		$car->run();
        		// 以上的容器配置可在 web.php配置文件中配置
        		// yii2/config/web.php,用以下取代即可
        		// 先里面配置成这样的形式
        		// 类型         'cache' => ['class' => 'yii\caching\FileCache',];
        		'car'=>['class'=>'app\controllers\car']
           		Yii::$container('app\controllers\Driver','app\controllers\ManDriver');
        		Yii::$app->car->run();
        	}
        }
        
        interface Driver
        {
        	public function drive();
        }
        class ManDriver implements Driver
        {
        	public function drive()
        	{
        		echo __FILE__;
        	}	
        }
        
        class Car
        {
        	private $driver = null;
        	function __construct(Driver $driver)
        	{
        		$this->driver = $driver;
        	}
        	function run()
        	{
        		$this->driver->drive();
        	}
        }
          
         
// 模块处理   
可通过学习 r = gii来后成
例如生成 Module Class: app\modules\article\Article 
Module ID: article
此时在 /modules 目录下生成 article，里面有相应的文件                       
在配置文件中配置才能使用模块
'modules'=>['article'=>'app\modules\article\Article'] 

同理:
例如生成 Module Class: app\modules\comment\Comment 
Module ID: comment
此时在 /modules 目录下生成 comment，里面有相应的文件                       
在配置文件中配置才能使用模块
 'modules'=>['comment'=>'app\modules\comment\Comment'] 
  为了组成 mvc,可分别单独建立 models文件夹,在里面建立子文件 Cate模型,对 article中用到的
<?php            
namespace app\modules\article\models;
use Yii;
use yii\db\ActiveRecord;
class Cate extends ActiveRecord
{
	public static function tableName()
	{
		return 'cate_new';
	}

	public static function test()
	{
		$rr = self::findOne('13');
		// echo $rr->name;
		return $rr->name;
	}
}
?>                 
	在控制器中，得引入模型
	<?php
	namespace app\modules\article\controllers;
	use Yii;
	use yii\web\Controller;
	use app\modules\article\models\Cate;  
	?>    
	// end -------------

	事件事例
	在/vendor建立 animal/Cat.php和 animal/Mourse.php
	cat.php文件
	<?php
	namespace vendor\animal;
	use yii\base\Component;
	use yii\base\Event;
	class MyEvent extends Event
	{
		public $message;
	}
	class Cat extends Component
	{
		public function shout()
		{
			$myEvent = new MyEvent;
			$myEvent->message = 'hi,lin3615';
			echo __FILE__;
			// 触发 miao事件,并传递参数
			$this->trigger('miao', $myEvent); 
		}
	}
	?>
	mourse.php文件
	<?php
	namespace vendor\animal;
	use yii\base\Component;
	class Mourse extends Component
	{
		public function run($message)
		{
			// 从 trigger中绑定传递过来的参数
			echo $message->message;
			echo __FILE__;
		}
	}
    ?>
	建立 AnimalController.php
	<?php
	namespace app\Controllers;
	use Yii;
	use vendor\animal\Cat;
	use vendor\animal\Mourse;
	use yii\base\Controller;
	use yii\base\Event;
	class AnimalController extends Controller
	{
		$cat = new Cat();
		// 实例多个，同时都绑定
		$cat1 = new Cat();
		$mourse = new Mourse();
		// 绑定miao事件到后面的实现中
		$cat->on('miao',[$mourse,'run']);
        // 可以绑定多个 如
        // $cat->on('method',[$obj,'function']);
        // 取消绑定时
        // $cat->off('miao',[$mourse, 'run']);
		$cat->shout(); // 触发事件
		// 如果一次性绑定全部的
		// Event::on(Cat::className(),'miao',[$mourse, 'run']);
		// $cat->shout();
		// $cat1->shout();

	}
	// end ==========




        */
        $row = (new \yii\db\Query())
        ->select(['id','name'])
        ->from('cate_new')
        ->where(['id'=>1])->all();
        print_r($row);
        
        $rr = self::findOne('13');
        echo $rr->name;
        return $rr->name;
    }
}
