<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personaldetail;

/**
 * PersonaldetailSearch represents the model behind the search form about `app\models\Personaldetail`.
 */
class PersonaldetailSearch extends Personaldetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpersonalDetail', 'iduser', 'phoneNumber'], 'integer'],
            [['email', 'currency'], 'safe'],
            [['ctc', 'monthlySalary'], 'number'],
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
        $query = Personaldetail::find();

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
            'idpersonalDetail' => $this->idpersonalDetail,
            'iduser' => $this->iduser,
            'ctc' => $this->ctc,
            'monthlySalary' => $this->monthlySalary,
            'phoneNumber' => $this->phoneNumber,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
