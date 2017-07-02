<?php
require_once('pworks/mvc/action/BaseAction.class.php');
require_once dirname(dirname(dirname(__FILE__))).'/model/User.class.php';

class DelInfoAction extends BaseAction
{
	public $id;
	public function execute()
	{
		if(!is_numeric($this->id))
		{
			$this -> addError('e0001','ID MUST INT NUMBER');
			return 'fail';
		}

		try {
			$res = User::DelInfo($this->id);
			return 'succ';
		} catch (Exception $e) {
			$error_info = $e->getMessage();
			$this->addError('e0002',$error_info);
			return fail;
		}
		

	}
}