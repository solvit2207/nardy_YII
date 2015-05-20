<?php
namespace app\models;
use yii\base\Model;
use app\base\Form;
class EntryForm extends Model{
	public $name;
	public $time;
	public $bones_num;
	public $throws;
	
	public function rules(){
		return[
			[['name','time','bones_num','throws'],'required'],
			['name','name'],		
		];
	}
}
?>