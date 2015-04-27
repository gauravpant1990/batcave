<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_skill".
 *
 * @property integer $iduser_skill
 * @property integer $iduser
 * @property integer $idskill
 *
 * @property User $iduser0
 * @property Skill $idskill0
 */
class UserSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'idskill'], 'required'],
            [['iduser', 'idskill'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser_skill' => Yii::t('app', 'Iduser Skill'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idskill' => Yii::t('app', 'Idskill'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdskill()
    {
        return $this->hasOne(Skill::className(), ['idskill' => 'idskill']);
    }
}
