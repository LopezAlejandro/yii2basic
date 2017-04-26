<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libros;

/**
 * app\models\LibrosSearch represents the model behind the search form about `app\models\Libros`.
 */
 class LibrosSearch extends Libros
{
    
	public $autorname;    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libros_id', 'ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['titulo', 'editorial', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_at', 'deleted_by', 'created', 'modified', 'deleted','autorname'], 'safe'],
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
        $query = Libros::find();

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
            'libros_id' => $this->libros_id,
            'ano' => $this->ano,
            'tipo_libro_id' => $this->tipo_libro_id,
            'nro_libro' => $this->nro_libro,
            'edicion' => $this->edicion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_at' => $this->deleted_at,
            'deleted_by' => $this->deleted_by,
            'created' => $this->created,
            'modified' => $this->modified,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'editorial', $this->editorial]);

        return $dataProvider;
    }
}
