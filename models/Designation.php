<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designation".
 *
 * @property integer $iddesignation
 * @property string $title
 *
 * @property Data[] $datas
 * @property Job[] $jobs
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation';
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
            'iddesignation' => Yii::t('app', 'Iddesignation'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['iddesignation' => 'iddesignation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['iddesignation' => 'iddesignation']);
    }
}
