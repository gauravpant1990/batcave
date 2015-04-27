<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property integer $idskill
 * @property string $title
 *
 * @property DataSkill[] $dataSkills
 * @property UserSkill[] $userSkills
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45],
			[['title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idskill' => Yii::t('app', 'Idskill'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataSkills()
    {
        return $this->hasMany(DataSkill::className(), ['idskill' => 'idskill']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()//Skills
    {
		return $this->hasMany(User::className(), ['iduser' => 'iduser'])->viaTable('user_skill', ['idskill' => 'idskill']);
        //return $this->hasMany(UserSkill::className(), ['idskill' => 'idskill']);
    }
	
	public function addSkill()
	{
		$model = $this->findOne(['title'=>$this->title]);
		if($model!=null)
		{
			return $model;
			/*$this->idskill = $model->idskill;
			$this->title = $model->title;*/
		}
		else{
			$this->save();
		}
	}
	
	/*public function beforeSave($insert)
	{
		parent::beforeSave($insert);
		if($this->findOne(['title'=>$this->title])!=null) {
			 return false;
		} else {
			return true;
		}
	}*/
}
