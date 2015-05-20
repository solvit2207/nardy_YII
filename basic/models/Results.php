<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property integer $id_results
 * @property integer $num
 * @property integer $count
 * @property double $rate
 * @property integer $id_experiment
 *
 * @property Experiment $idExperiment
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'count', 'rate', 'id_experiment'], 'required'],
            [['num', 'count', 'id_experiment'], 'integer'],
            [['rate'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_results' => 'Id Results',
            'num' => 'Num',
            'count' => 'Count',
            'rate' => 'Rate',
            'id_experiment' => 'Id Experiment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdExperiment()
    {
        return $this->hasOne(Experiment::className(), ['id_experiment' => 'id_experiment']);
    }
}
