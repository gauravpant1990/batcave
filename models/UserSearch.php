<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_search".
 *
 * @property integer $iduser_search
 * @property integer $iduser
 * @property string $query
 * @property string $time
 * @property integer $rowsReturned
 *
 * @property User $iduser0
 */
class UserSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_search';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'rowsReturned'], 'integer'],
            [['time'], 'safe'],
            [['query'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser_search' => Yii::t('app', 'Iduser Search'),
            'iduser' => Yii::t('app', 'Iduser'),
            'query' => Yii::t('app', 'Query'),
            'time' => Yii::t('app', 'Time'),
            'rowsReturned' => Yii::t('app', 'Rows Returned'),
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
