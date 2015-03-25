<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personaldetails".
 *
 * @property integer $idpersonalDetails
 * @property integer $iduser
 * @property string $email
 * @property double $ctc
 * @property double $monthlySalary
 * @property string $currency
 * @property integer $phoneNumber
 *
 * @property User $iduser0
 */
class Personaldetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personaldetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser'], 'required'],
            [['iduser', 'phoneNumber'], 'integer'],
            [['ctc', 'monthlySalary'], 'number'],
            [['email', 'currency'], 'string', 'max' => 45],
            [['iduser'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpersonalDetails' => Yii::t('app', 'Idpersonal Details'),
            'iduser' => Yii::t('app', 'Iduser'),
            'email' => Yii::t('app', 'Email'),
            'ctc' => Yii::t('app', 'Ctc'),
            'monthlySalary' => Yii::t('app', 'Monthly Salary'),
            'currency' => Yii::t('app', 'Currency'),
            'phoneNumber' => Yii::t('app', 'Phone Number'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }
}
