<?php
namespace app\controllers;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\Results;
class ResultsController extends Controller{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
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