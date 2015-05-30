<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advancedsearch".
 *
 * @property string $comp
 * @property string $desig
 * @property string $sal
 * @property string $exp
 * @property string $location
 * @property string $ypass
 * @property string $edu
 * @property string $skills
 * @property string $updated
 * @property string $Active
 * @property string $resid
 * @property string $gender
 * @property string $last_updated
 * @property string $metaData
 * @property string $name
 * @property string $previousDesig
 * @property string $previousComp
 * @property string $desig_visible
 */
class Advancedsearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advancedsearch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp', 'desig', 'sal', 'exp', 'ypass', 'edu', 'skills', 'updated', 'Active', 'resid', 'gender', 'last_updated', 'metaData', 'desig_visible'], 'required'],
            [['comp', 'desig', 'sal', 'exp', 'ypass', 'skills', 'updated', 'Active', 'resid', 'metaData', 'desig_visible'], 'string', 'max' => 100],
            [['location', 'name', 'previousDesig', 'previousComp'], 'string', 'max' => 60],
            [['edu'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 10],
            [['last_updated'], 'string', 'max' => 20],
            [['comp', 'desig', 'skills'], 'unique', 'targetAttribute' => ['comp', 'desig', 'skills'], 'message' => 'The combination of Comp, Desig and Skills has already been taken.'],
            [['skills', 'updated', 'resid'], 'unique', 'targetAttribute' => ['skills', 'updated', 'resid'], 'message' => 'The combination of Skills, Updated and Resid has already been taken.'],
            [['comp', 'desig', 'skills'], 'unique', 'targetAttribute' => ['comp', 'desig', 'skills'], 'message' => 'The combination of Comp, Desig and Skills has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comp' => Yii::t('app', 'Comp'),
            'desig' => Yii::t('app', 'Desig'),
            'sal' => Yii::t('app', 'Sal'),
            'exp' => Yii::t('app', 'Exp'),
            'location' => Yii::t('app', 'Location'),
            'ypass' => Yii::t('app', 'Ypass'),
            'edu' => Yii::t('app', 'Edu'),
            'skills' => Yii::t('app', 'Skills'),
            'updated' => Yii::t('app', 'Updated'),
            'Active' => Yii::t('app', 'Active'),
            'resid' => Yii::t('app', 'Resid'),
            'gender' => Yii::t('app', 'Gender'),
            'last_updated' => Yii::t('app', 'Last Updated'),
            'metaData' => Yii::t('app', 'Meta Data'),
            'name' => Yii::t('app', 'Name'),
            'previousDesig' => Yii::t('app', 'Previous Desig'),
            'previousComp' => Yii::t('app', 'Previous Comp'),
            'desig_visible' => Yii::t('app', 'Desig Visible'),
        ];
    }
}
