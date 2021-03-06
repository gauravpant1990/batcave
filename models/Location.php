<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $idlocation
 * @property string $city
 * @property string $country
 *
 * @property UserLocation[] $userLocations
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'country'], 'required'],
            [['city', 'country'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlocation' => Yii::t('app', 'Idlocation'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()//Location
    {
        //return $this->hasMany(UserLocation::className(), ['idlocation' => 'idlocation']);
		return $this->hasMany(User::className(), ['iduser' => 'iduser'])->viaTable('user_location', ['idlocation' => 'idlocation']);
    }
	
	public function addLocation($location, $user)
	{
		$city = $location['name'];
		$country = $location['country']['code'];
		$this->city = $city;
		$this->country = $country;
		$model = $this->findOne(['city'=>$city, 'country'=>$country]);
		if($model!=null)
		{
			$this->isNewRecord = false;
			$this->idlocation = $model->idlocation;
		}
		else{
			$this->save();
		}
		$this->link('users',$user);
	}
}
