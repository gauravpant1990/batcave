<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $iddata
 * @property integer $idcompany
 * @property string $datacol
 * @property integer $iddesignation
 * @property double $ctc
 * @property string $exp
 * @property string $passYear
 * @property integer $ideducation
 * @property string $eduText
 * @property string $skillText
 * @property string $updated
 * @property string $active
 * @property string $gender
 * @property string $metaData
 *
 * @property Company $idcompany0
 * @property Designation $iddesignation0
 * @property Education $ideducation0
 * @property DataSkill[] $dataSkills
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcompany', 'iddesignation', 'ideducation'], 'integer'],
            [['ctc', 'exp'], 'number'],
            [['passYear', 'updated', 'active'], 'safe'],
            [['eduText', 'skillText', 'gender', 'metaData'], 'string'],
            [['datacol'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddata' => Yii::t('app', 'Iddata'),
            'idcompany' => Yii::t('app', 'Idcompany'),
            'datacol' => Yii::t('app', 'Datacol'),
            'iddesignation' => Yii::t('app', 'Iddesignation'),
            'ctc' => Yii::t('app', 'Ctc'),
            'exp' => Yii::t('app', 'Exp'),
            'passYear' => Yii::t('app', 'Pass Year'),
            'ideducation' => Yii::t('app', 'Ideducation'),
            'eduText' => Yii::t('app', 'Edu Text'),
            'skillText' => Yii::t('app', 'Skill Text'),
            'updated' => Yii::t('app', 'Updated'),
            'active' => Yii::t('app', 'Active'),
            'gender' => Yii::t('app', 'Gender'),
            'metaData' => Yii::t('app', 'Meta Data'),
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdeducation0()
    {
        return $this->hasOne(Education::className(), ['ideducation' => 'ideducation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataSkills()
    {
        return $this->hasMany(DataSkill::className(), ['iddata' => 'iddata']);
    }
}
