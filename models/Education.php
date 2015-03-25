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
    public function getIduser0()
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
    public function getIdschool0()
    {
        return $this->hasOne(School::className(), ['idschool' => 'idschool']);
    }
}
