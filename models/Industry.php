<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industry".
 *
 * @property integer $idindustry
 * @property string $title
 *
 * @property UserIndustry[] $userIndustries
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idindustry' => Yii::t('app', 'Idindustry'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIndustries()
    {
        return $this->hasMany(UserIndustry::className(), ['idindustry' => 'idindustry']);
    }
}
