<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SageProduto;

/**
 * SageProdutoSearch represents the model behind the search form about `app\models\SageProduto`.
 */
class SageProdutoSearch extends SageProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_subcategoria1', 'id_fornecedor', 'estoque', 'estoque_minimo', 'estoque_maximo', 'estoque_compra', 'ncm', 'inativo', 'tipo', 'id_subcategoria2'], 'integer'],
            [['unidade', 'descricao', 'observacoes', 'codbarras', 'fator_unidade_venda', 'marca', 'composicao', 'materia_prima', 'material_expediente', 'moeda'], 'safe'],
            [['custo', 'preco_venda1', 'preco_venda2', 'preco_venda3', 'tamanho', 'paravenda'], 'number'],
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
        $query = SageProduto::find();
        
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
            'id' => $this->id,
            'id_subcategoria1' => $this->id_subcategoria1,
            'custo' => $this->custo,
            'preco_venda1' => $this->preco_venda1,
            'id_fornecedor' => $this->id_fornecedor,
            'estoque' => $this->estoque,
            'preco_venda2' => $this->preco_venda2,
            'preco_venda3' => $this->preco_venda3,
            'estoque_minimo' => $this->estoque_minimo,
            'estoque_maximo' => $this->estoque_maximo,
            'estoque_compra' => $this->estoque_compra,
            'ncm' => $this->ncm,
            'tamanho' => $this->tamanho,
            'inativo' => $this->inativo,
            'tipo' => $this->tipo,
            'id_subcategoria2' => $this->id_subcategoria2,
            'paravenda' => $this->paravenda,
        ]);

        $query->andFilterWhere(['like', 'unidade', $this->unidade])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes])
            ->andFilterWhere(['like', 'codbarras', $this->codbarras])
            ->andFilterWhere(['like', 'fator_unidade_venda', $this->fator_unidade_venda])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'composicao', $this->composicao])
            ->andFilterWhere(['like', 'materia_prima', $this->materia_prima])
            ->andFilterWhere(['like', 'material_expediente', $this->material_expediente])
            ->andFilterWhere(['like', 'moeda', $this->moeda]);

        return $dataProvider;
    }
}
