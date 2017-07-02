<?php
require_once dirname(dirname(__FILE__)).'/activerecord/ActiveRecord.php';

require_once dirname(__FILE__).'/init.inc.php';

require_once dirname(__FILE__).'/ErrorCode.inc.php';

class User extends ActiveRecord\Model
{
	 static public $table_name = 'users';

	 /**
	  * [MakeCreate INSERT]
	  * @param [type] $arr [description]
	  */
	 public  static function MakeInfo($name,$age)
	 {
	 	if(!self::ParamIntFilters($age)){
	 		throw new Exception('AGE MUST NUMBER',ErrorCode::PARAM_MUST_INT);
	 	}
	 	$arr = [];
		$arr['name'] = $name;
		$arr['age'] = $age;	
	 	$res = self::create($arr);
	 	return $res;
	 }

	 /**
	  * [GetInfo SELECT]
	  * @param [type] $id [description]
	  */
	 public  static function GetInfo($id)
	 {
	 	if(!self::ParamIntFilters($id))
	 	{
	 		throw new Exception('ID MUST NUMBER',ErrorCode::PARAM_MUST_INT);
	 	}

	 	try {
	 		$result  = self::find($id);
		 	$name = $result->name;
		 	$age = $result->age;
		 	$res = [];
		 	$res['name'] = $name;
		 	$res['age'] = $age;
		 	return $res;
	 	} catch (Exception $e) {
	 		$error_info = $e->getMessage(); 
	 		throw new Exception($error_info,ErrorCode::COULD_NOT_FIND);
	 	}
	 	
	 }

	 /**
	  * [DelInfo DELETE]
	  * @param [INT] $id [description]
	  */
	 public static function DelInfo($id)
	 {
	 	$res= self::find($id)->delete();
	 	return $res;
	 }

	 /**
	  * [UpdateInfo UPDATE]
	  * @param [Int] $id  [description]
	  * @param [String] $name [description]
	  */
	 public static function UpdateInfo($id,$name)
	 {
	 	$post = self::find($id);
	 	$post->name = $name;
	 	$res = $post->save();

	 	return $res;

	 }

	 /**
	  * [ParamAgeFilters AGE TYPE]
	  * @param [INT] $age [description]
	  */
	 public static function ParamIntFilters($param)
	 {
	 	if(!is_numeric($param))
		{
			return false;
		}
		return true;
	 }

	 /**
	  * [ExistRecord description]
	  * @param [type] $id [description]
	  */
	 public static function ExistRecord($id)
	 {
	 	if(self::find($id)){
	 		return true;
	 	}
	 	return true;

	 }
}



