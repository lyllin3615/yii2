<?php
namespace app\Behavior;
use yii\base\Behavior;
class Behaviors1 extends Behavior
{
	public $height;
	public function eat()
	{
		echo 'dog eat';
	}
}