<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $idjob
 * @property integer $iddesignation
 * @property integer $iduser
 * @property integer $idcompany
 * @property string $startDate
 * @property string $endDate
 * @property integer $isCurrent
 *
 * @property User $iduser0
 * @property Company $idcompany0
 * @property Designation $iddesignation0
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddesignation', 'iduser', 'idcompany', 'isCurrent'], 'integer'],
            [['startDate', 'endDate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjob' => Yii::t('app', 'Idjob'),
            'iddesignation' => Yii::t('app', 'Iddesignation'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idcompany' => Yii::t('app', 'Idcompany'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'isCurrent' => Yii::t('app', 'Is Current'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcompany0()
    {
        return $this->hasOne(Company::className(), ['idcompany' => 'idcompany']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddesignation0()
    {
        return $this->hasOne(Designation::className(), ['iddesignation' => 'iddesignation']);
    }
	
	public function addJobs($past, $current, $user)
	{
		if($past['@attributes']['total']==1 && !empty($past['position']['id']))
		{
			$oldpast = $past['position'];
			$past['position'] = null;
			$past['position'][0]=$oldpast;
			
		}
		if($current['@attributes']['total']==1 && !empty($current['position']['id']))
		{
			$oldcurrent = $current['position'];
			$current['position'] = null;
			$current['position'][0]=$oldcurrent;
		}
		$jobs = array_merge($past['position'],$current['position']);
		//var_dump($jobs);return;
		foreach($jobs as $key=>$job)
		{
			$model = new Job();
			$job = (array)$job;
			$designation = new \app\models\Designation;
			$designation->addDesignation($job['title']);
			$model->iddesignation = $designation->iddesignation;
			
			$temp = (array)$job['company'];
			$company = new \app\models\Company;
			$company->addCompany($temp['name']);
			$model->idcompany = $company->idcompany;
			
			$temp = (array)$job['start-date'];
			$startDate = date_create_from_format( 'd-n-Y' , "01-".$temp['month']."-".$temp['year']);
			$model->startDate = $temp['year'].'-'.$temp['month'].'-01';
			
			if($job['is-current']=="false")
			{
				$temp = (array)$job['end-date'];
				//$endDate = date_create_from_format( 'd-n-Y' , "01-".$temp['month']."-".$temp['year']);
				$model->endDate = $temp['year'].'-'.$temp['month'].'-01';
			}
			
			if($job['is-current']=="true") $model->isCurrent = 1;
			else $model->isCurrent = 0;
			$model->link('user',$user);
			if($model->validate())
			{
				$model->save();
			}
		}
	}
}
