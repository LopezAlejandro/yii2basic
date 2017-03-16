<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lectores;

/**
 * LectoresSearch represents the model behind the search form about `app\models\Lectores`.
 */
class LectoresSearch extends Lectores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_crea_mod', 'create_time', 'update_time', 'nombre', 'documento', 'direccion', 'telefono', 'mail'], 'safe'],
            [['lectores_id', 'clase_lector_id', 'clase_documento_id'], 'integer'],
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
        $query = Lectores::find();

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
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'lectores_id' => $this->lectores_id,
            'clase_lector_id' => $this->clase_lector_id,
            'clase_documento_id' => $this->clase_documento_id,
        ]);

        $query->andFilterWhere(['like', 'usuario_crea_mod', $this->usuario_crea_mod])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'mail', $this->mail]);

        return $dataProvider;
    }
}
