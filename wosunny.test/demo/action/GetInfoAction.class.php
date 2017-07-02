<?php
require_once('pworks/mvc/action/BaseAction.class.php');
require_once dirname(dirname(dirname(__FILE__))).'/model/User.class.php';
require_once dirname(__FILE__).'/Test.class.php';

class GetInfoAction extends BaseAction {
    
    public $id;
    
    public function execute() {
        try{
            $result = User::GetInfo($this->id);
            $this->setData('result',$result);
            return 'succ';
        }catch(Exception $e)
        {
            $error = $e->getMessage();
            $code = $e->getCode();
            $this -> addError($code,$error);
            return 'fail';
        }
       

    }
    // public $name;
    // $result = Test::getTest();

        // if (empty($result)) {
        //     $this->addError('e10001','xxxx','ssss');
        //     return 'error';
        // }
        
        // $this->setData('result',['name'=>$this->name,'id'=>$this->id]);
        // return 'succ';
}
