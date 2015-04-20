<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personaldetail".
 *
 * @property integer $idpersonalDetail
 * @property integer $iduser
 * @property string $email
 * @property double $ctc
 * @property double $monthlySalary
 * @property string $currency
 * @property integer $phoneNumber
 *
 * @property User $iduser0
 */
class Personaldetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personaldetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser'], 'required'],
            [['iduser'], 'integer'],
            [['ctc', 'monthlySalary', 'phoneNumber'], 'number'],
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
            'idpersonalDetail' => Yii::t('app', 'Idpersonal Detail'),
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }
}
