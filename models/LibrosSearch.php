<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libros;

/**
 * LibrosSearch represents the model behind the search form about `app\models\Libros`.
 */
class LibrosSearch extends Libros
{
    public function rules()
    {
        return [
            [['libros_id', 'ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['titulo', 'editorial'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Libros::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'libros_id' => $this->libros_id,
            'ano' => $this->ano,
            'tipo_libro_id' => $this->tipo_libro_id,
            'nro_libro' => $this->nro_libro,
            'edicion' => $this->edicion,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'editorial', $this->editorial]);

        return $dataProvider;
    }
}
