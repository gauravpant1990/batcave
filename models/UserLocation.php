<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_location".
 *
 * @property integer $iduser_location
 * @property integer $iduser
 * @property integer $idlocation
 *
 * @property User $iduser0
 * @property Location $idlocation0
 */
class UserLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'idlocation'], 'required'],
            [['iduser', 'idlocation'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser_location' => Yii::t('app', 'Iduser Location'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idlocation' => Yii::t('app', 'Idlocation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdlocation0()
    {
        return $this->hasOne(Location::className(), ['idlocation' => 'idlocation']);
    }
}
