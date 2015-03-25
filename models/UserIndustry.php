<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_industry".
 *
 * @property integer $iduser_industry
 * @property integer $idindustry
 * @property integer $iduser
 *
 * @property User $iduser0
 * @property Industry $idindustry0
 */
class UserIndustry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idindustry', 'iduser'], 'required'],
            [['idindustry', 'iduser'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser_industry' => Yii::t('app', 'Iduser Industry'),
            'idindustry' => Yii::t('app', 'Idindustry'),
            'iduser' => Yii::t('app', 'Iduser'),
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
    public function getIdindustry()
    {
        return $this->hasOne(Industry::className(), ['idindustry' => 'idindustry']);
    }
}
