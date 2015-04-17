<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KdhUser;

/**
 * KdhUserSearch represents the model behind the search form about `app\models\KdhUser`.
 */
class KdhUserSearch extends KdhUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'numConnections', 'idpersonalDetails'], 'integer'],
            [['firstName', 'lastName', 'linkedInID', 'profileURL', 'signUpTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = KdhUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'iduser' => $this->iduser,
            'numConnections' => $this->numConnections,
            'signUpTime' => $this->signUpTime,
            'idpersonalDetails' => $this->idpersonalDetails,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'linkedInID', $params['linkedInID']])//$this->linkedInID]
            ->andFilterWhere(['like', 'profileURL', $this->profileURL]);
        return $dataProvider;
    }
}
