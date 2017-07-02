<?php
require_once('pworks/mvc/action/BaseAction.class.php');
require_once dirname(dirname(dirname(__FILE__))).'/model/User.class.php';

class PutInfoAction extends BaseAction
{
	public $id;
	public $name;
	public function execute()
	{
		try {
			$res = User::UpdateInfo($this->id,$this->name);
			return 'succ';
		} catch (Exception $e) {
			$message = $e->getMessage();
			$this->addError('e0001',$message);
			return 'fail';
		}
		

	}
}