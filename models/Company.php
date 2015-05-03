<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $idcompany
 * @property string $title
 *
 * @property Data[] $datas
 * @property Job[] $jobs
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcompany' => Yii::t('app', 'Idcompany'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['idcompany' => 'idcompany']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['idcompany' => 'idcompany']);
    }
	
	public function addCompany($company)
	{
		$model = $this->findOne(['title'=>$company]);
		$this->title = $company;
		if($model!=null)
		{
			$this->idcompany = $model->idcompany;
		}
		else{
			$this->save();
		}
	}
}
