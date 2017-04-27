<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Multas;

/**
 * app\models\MultasSearch represents the model behind the search form about `app\models\Multas`.
 */
 class MultasSearch extends Multas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['multas_id', 'activa'], 'integer'],
            [['fin_multa'], 'safe'],
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
        $query = Multas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'multas_id' => $this->multas_id,
            'fin_multa' => $this->fin_multa,
            'activa' => $this->activa,
        ]);

        return $dataProvider;
    }
}
