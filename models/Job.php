<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $idjob
 * @property integer $iddesignation
 * @property integer $iduser
 * @property integer $idcompany
 * @property string $startDate
 * @property string $endDate
 * @property integer $isCurrent
 *
 * @property User $iduser0
 * @property Company $idcompany0
 * @property Designation $iddesignation0
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddesignation', 'iduser', 'idcompany', 'isCurrent'], 'integer'],
            [['startDate', 'endDate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjob' => Yii::t('app', 'Idjob'),
            'iddesignation' => Yii::t('app', 'Iddesignation'),
            'iduser' => Yii::t('app', 'Iduser'),
            'idcompany' => Yii::t('app', 'Idcompany'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'isCurrent' => Yii::t('app', 'Is Current'),
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
    public function getIdcompany0()
    {
        return $this->hasOne(Company::className(), ['idcompany' => 'idcompany']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddesignation0()
    {
        return $this->hasOne(Designation::className(), ['iddesignation' => 'iddesignation']);
    }
}
