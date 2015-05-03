<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $idschool
 * @property string $title
 *
 * @property Education[] $educations
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idschool' => Yii::t('app', 'Idschool'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['idschool' => 'idschool']);
    }
	
	public function addSchool()
	{
		$model = $this->findOne(['title'=>$this->title]);
		if($model!=null)
		{
			//return $model;
			$this->idschool = $model->idschool;
			$this->title = $model->title;
		}
		else{
			$this->save();
		}
	}
}
