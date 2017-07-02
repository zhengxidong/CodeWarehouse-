<?php
require_once('pworks/mvc/action/BaseAction.class.php');
require_once dirname(dirname(dirname(__FILE__))).'/model/User.class.php';
require_once dirname(__FILE__).'/Test.class.php';
class CreateInfoAction extends BaseAction
{
	public $name;
	public $age;
	public function execute()
	{	

		try{
			$ar  = User::MakeInfo($this->name,$this->age);
			$this->setData("result",$ar);
			return 'succ';	
		}catch(Exception $e){
			$code = $e->getCode();
			$message = $e->getMessage();
			$this -> addError($code,$message);
			return 'fail';
		}
		
	}

// $user = User::find(1);
		// $arr = [];
		// $arr['name'] = $user->name;
		// $arr['age'] = $user->age;

		// $info = User::name();
		// if(!empty(Test::getTest()))
		// {
		// 	$this->addInfo('e0001',$info);
		// 	return 'error';
		// }

		// $this->setData("result",$arr);
		// //中文会unicode编码为 \u 格式   因为JsonResult.class.php 中json_encode没有进行 JSON_UNESCAPED_UNICODE
		// return 'succ';
}