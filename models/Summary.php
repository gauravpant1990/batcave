<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summary".
 *
 * @property integer $idsummary
 * @property integer $iduser
 * @property string $content
 *
 * @property User $iduser0
 */
class Summary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'content'], 'required'],
            [['iduser'], 'integer'],
            [['content'], 'string'],
            [['iduser'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsummary' => Yii::t('app', 'Idsummary'),
            'iduser' => Yii::t('app', 'Iduser'),
            'content' => Yii::t('app', 'Content'),
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
