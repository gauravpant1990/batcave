<?php
use app\models\KdhUserSearch;
namespace app\models;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use Yii;

//class User extends \yii\base\Object implements \yii\web\IdentityInterface
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
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
            [['firstName', 'linkedInID', 'profileURL', 'numConnections'], 'required'],//, 'idpersonaldetail'
            [['numConnections', 'idpersonaldetail'], 'integer'],
            [['signUpTime'], 'safe'],
            [['firstName', 'lastName', 'linkedInID'], 'string', 'max' => 45],//, 'profileURL'
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
            'idpersonaldetail' => Yii::t('app', 'Idpersonal Details'),
        ];
    }
     /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
/* modified */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
	
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['linkedInID' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->iduser;//$this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->linkedInID;//$this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
	
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
    public function getPersonaldetail()
    {
        return $this->hasMany(Personaldetail::className(), ['iduser' => 'iduser']);
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
