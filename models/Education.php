<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $ideducation
 * @property integer $iduser
 * @property integer $iddegree
 * @property string $passYear
 * @property integer $idfieldOfStudy
 * @property integer $idschool
 * @property integer $isFinal
 *
 * @property Data[] $datas
 * @property User $iduser0
 * @property Degree $iddegree0
 * @property Fieldofstudy $idfieldOfStudy0
 * @property School $idschool0
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser'], 'required'],
            [['iduser', 'iddegree', 'idfieldOfStudy', 'idschool', 'isFinal'], 'integer'],
            [['passYear'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ideducation' => Yii::t('app', 'Ideducation'),
            'iduser' => Yii::t('app', 'Iduser'),
            'iddegree' => Yii::t('app', 'Iddegree'),
            'passYear' => Yii::t('app', 'Pass Year'),
            'idfieldOfStudy' => Yii::t('app', 'Idfield Of Study'),
            'idschool' => Yii::t('app', 'Idschool'),
            'isFinal' => Yii::t('app', 'Is Final'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['ideducation' => 'ideducation']);
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
    public function getIddegree0()
    {
        return $this->hasOne(Degree::className(), ['iddegree' => 'iddegree']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdfieldOfStudy0()
    {
        return $this->hasOne(Fieldofstudy::className(), ['idfieldOfStudy' => 'idfieldOfStudy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['idschool' => 'idschool']);
    }
	
	public function addEducations($educationsLinkedIn, $count, $iduser)
	{
		if($count==1)
		{
			$educationsLinkedIn[0] = $educationsLinkedIn;
		}
		foreach($educationsLinkedIn as $key=>$education)
		{
			$model = new Education();
			$temp = (array)($education);
			
			if(!empty($temp['school-name']))
			{
				$school = new \app\models\School;
				$school->title = $temp['school-name'];
				$school->addSchool();
				$model->idschool = $school->idschool;
			}
			
			if(!empty($temp['degree']))
			{
				$degree = new \app\models\Degree;
				$degree->title = $temp['degree'];
				$degree->addDegree();
				$model->iddegree = $degree->iddegree;
			}
			
			if(!empty($temp['end-date']))
			{
				$passYear = (array)$temp['end-date'];
				$passYear = $passYear['year'];
				$model->passYear = $passYear;
			}
			
			if(!empty($temp['field-of-study']))
			{
				$fieldOfStudy = new \app\models\Fieldofstudy;
				$fieldOfStudy->title = $temp['field-of-study'];
				$fieldOfStudy->addFieldofstudy();
				$model->idfieldOfStudy = $fieldOfStudy->idfieldOfStudy;
			}
			
			
			if($key==0) $isFinal = 1;
			else $isFinal = 0;
			
			$model->iduser = $iduser;
			$model->isFinal = $isFinal;
			$model->save();
		}
	}
}
