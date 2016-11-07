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