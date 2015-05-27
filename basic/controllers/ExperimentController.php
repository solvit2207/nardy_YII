<?php
namespace app\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Experiment;
use app\models\EntryForm;
use app\models\Results;
class ExperimentController extends Controller{
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
	public function actionAll(){
		$query=Experiment::find();
		$pagination = new Pagination([
			'defaultPageSize'=>20,
			'totalCount'=>$query->count(),
		]);
		$names=$query->orderBy('name')->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render('all',['names'=>$names, 'pagination'=>$pagination,]);
	}
	public function actionEntry(){
		$exp = new Experiment;
		$exp -> name='Ivan';
		$exp -> time='12:48';
		$exp -> date='27.05.15';
		$exp -> bones_num='2';
		$exp -> throws='36000';
		$exp->save();
		
		$n[2]=$n[3]=$n[4]=$n[5]=$n[6]=$n[7]=$n[8]=$n[9]=$n[10]=$n[11]=$n[12]=0;
		for($i=0;$i<36000;$i++){
			$sum=0;
				for($j=0;$j<2;$j++){
					$s=rand(1,6);
					$sum+=$s;
				}
			switch ($sum){
				case 2: $n[2]++; break;
				case 3: $n[3]++; break;
				case 4: $n[4]++; break;
				case 5: $n[5]++; break;
				case 6: $n[6]++; break;
				case 7: $n[7]++; break;
				case 8: $n[8]++; break;
				case 9: $n[9]++; break;
				case 10: $n[10]++; break;
				case 11: $n[11]++; break;
				case 12: $n[12]++; break;
			}
			}
		
		for($i=2;$i<=12;$i++){
		$res=new Results;
		$res->num=$i;
		$res->count=$n[$i];
		$res->rate=number_format($n[$i]*100.0/36000, 2, '.', '');
		$res->id_experiment=$exp->id_experiment;
		$all[]=$res;
		$res->save();
		}
		return $this->render('index',['results'=>$all,'experiment'=>$exp]);
	}
	
}

?>