<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $iduser
 * @property string $firstName
 * @property string $lastName
 * @property string $linkedInID
 * @property string $profileURL
 * @property integer $numConnections
 * @property string $signUpTime
 * @property integer $idpersonalDetails
 *
 * @property Education[] $educations
 * @property Job[] $jobs
 * @property Personaldetails[] $personaldetails
 * @property Summary[] $summaries
 * @property UserIndustry[] $userIndustries
 * @property UserLocation[] $userLocations
 * @property UserSearch[] $userSearches
 * @property UserSkill[] $userSkills
 */
class KdhUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'linkedInID', 'profileURL', 'numConnections', 'idpersonalDetails'], 'required'],
            [['numConnections', 'idpersonalDetails'], 'integer'],
            [['signUpTime'], 'safe'],
            [['firstName', 'lastName', 'linkedInID', 'profileURL'], 'string', 'max' => 45],
            [['linkedInID'], 'unique'],
            [['profileURL'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduser' => Yii::t('app', 'Iduser'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'linkedInID' => Yii::t('app', 'Linked In ID'),
            'profileURL' => Yii::t('app', 'Profile Url'),
            'numConnections' => Yii::t('app', 'Num Connections'),
            'signUpTime' => Yii::t('app', 'Sign Up Time'),
            'idpersonalDetails' => Yii::t('app', 'Idpersonal Details'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaldetails()
    {
        return $this->hasMany(Personaldetails::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIndustries()
    {
        return $this->hasMany(UserIndustry::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLocations()
    {
        return $this->hasMany(UserLocation::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSearches()
    {
        return $this->hasMany(UserSearch::className(), ['iduser' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSkills()
    {
        return $this->hasMany(UserSkill::className(), ['iduser' => 'iduser']);
    }
}
