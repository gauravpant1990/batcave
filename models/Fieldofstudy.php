<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fieldofstudy".
 *
 * @property integer $idfieldOfStudy
 * @property string $title
 *
 * @property Education[] $educations
 */
class Fieldofstudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fieldofstudy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfieldOfStudy' => Yii::t('app', 'Idfield Of Study'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['idfieldOfStudy' => 'idfieldOfStudy']);
    }
}
