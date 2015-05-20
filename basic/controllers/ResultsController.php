<?php
namespace app\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Results;
class ResultsController extends Controller{
	public function actionIndex(){
		$query=Results::find();
		$pagination = new Pagination([
			'defaultPageSize'=>20,
			'totalCount'=>$query->count(),
		]);
		$results=$query->orderBy('id_experiment')->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render('index',['results'=>$results, 'pagination'=>$pagination,]);
	}
}
?>