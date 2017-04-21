<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Copias;


/**
 * CopiasSearch represents the model behind the search form about `app\models\Copias`.
 */
class CopiasSearch extends Copias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['copias_id', 'estado_id', 'libros_id', 'nro_copia', 'deposito_id'], 'integer'],
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
        $query = Copias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'copias_id' => $this->copias_id,
            'estado_id' => $this->estado_id,
            'libros_id' => $this->libros_id,
            'nro_copia' => $this->nro_copia,
            'deposito_id' => $this->deposito_id,
        ]);

        return $dataProvider;
    }
}
