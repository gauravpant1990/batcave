<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Data;

/**
 * DataSearch represents the model behind the search form about `app\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddata', 'idcompany', 'iddesignation', 'ideducation'], 'integer'],
            [['datacol', 'passYear', 'eduText', 'skillText', 'updated', 'active', 'gender', 'metaData'], 'safe'],
            [['ctc', 'exp'], 'number'],
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
        $query = Data::find();

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
            'iddata' => $this->iddata,
            'idcompany' => $this->idcompany,
            'iddesignation' => $this->iddesignation,
            'ctc' => $this->ctc,
            'exp' => $this->exp,
            'passYear' => $this->passYear,
            'ideducation' => $this->ideducation,
            'updated' => $this->updated,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'datacol', $this->datacol])
            ->andFilterWhere(['like', 'eduText', $this->eduText])
            ->andFilterWhere(['like', 'skillText', $this->skillText])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'metaData', $this->metaData]);

        return $dataProvider;
    }
}
