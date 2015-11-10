<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sage_produto".
 *
 * @property string $id
 * @property string $id_subcategoria1
 * @property string $unidade
 * @property string $descricao
 * @property double $custo
 * @property double $preco_venda1
 * @property string $observacoes
 * @property string $id_fornecedor
 * @property integer $estoque
 * @property string $codbarras
 * @property double $preco_venda2
 * @property double $preco_venda3
 * @property integer $estoque_minimo
 * @property integer $estoque_maximo
 * @property integer $estoque_compra
 * @property string $fator_unidade_venda
 * @property integer $ncm
 * @property string $marca
 * @property double $tamanho
 * @property integer $inativo
 * @property integer $tipo
 * @property string $id_subcategoria2
 * @property string $composicao
 * @property string $materia_prima
 * @property string $material_expediente
 * @property double $paravenda
 * @property string $moeda
 *
 * @property SageFornecedor $idFornecedor
 * @property SageCategoria $idSubcategoria1
 * @property SageCategoria $idSubcategoria2
 */
class SageProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sage_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_subcategoria1', 'id_fornecedor', 'id_subcategoria2'], 'required'],
            [['id_subcategoria1', 'id_fornecedor', 'estoque', 'estoque_minimo', 'estoque_maximo', 'estoque_compra', 'ncm', 'inativo', 'id_subcategoria2'], 'integer'],
            [['descricao', 'observacoes','tipo','identificacao'], 'safe'],
            [['custo', 'preco_venda1', 'preco_venda2', 'preco_venda3', 'tamanho', 'paravenda'], 'number'],
            [['unidade', 'moeda'], 'string', 'max' => 5],
            [['codbarras'], 'string', 'max' => 20],
            [['fator_unidade_venda', 'composicao', 'materia_prima', 'material_expediente'], 'string', 'max' => 100],
            [['marca'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_subcategoria1' => 'Subcategoria 1',
            'unidade' => 'Unidade',
            'descricao' => 'Descrição',
            'custo' => 'Custo',
            'preco_venda1' => 'Preço Venda 1',
            'observacoes' => 'Observações',
            'id_fornecedor' => 'Fornecedor',
            'estoque' => 'Estoque',
            'codbarras' => 'Código de barras',
            'preco_venda2' => 'Preço Venda 2',
            'preco_venda3' => 'Preço Venda 3',
            'estoque_minimo' => 'Estoque Minimo',
            'estoque_maximo' => 'Estoque Máximo',
            'estoque_compra' => 'Estoque Compra',
            'fator_unidade_venda' => 'Fator Unidade Venda',
            'ncm' => 'Ncm',
            'marca' => 'Marca',
            'tamanho' => 'Tamanho',
            'inativo' => 'Status',
            'tipo' => 'Tipo',
            'id_subcategoria2' => 'Subcategoria 2',
            'composicao' => 'Composição',
            'materia_prima' => 'Matéria Prima',
            'material_expediente' => 'Material Expediente',
            'paravenda' => 'Para venda',
            'moeda' => 'Moeda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFornecedor()
    {
        return $this->hasOne(SageFornecedor::className(), ['id' => 'id_fornecedor']);
    }
	

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubcategoria1()
    {
        return $this->hasOne(SageSubcategoria::className(), ['id' => 'id_subcategoria1']);
    }
    public function getIdSubcategoria2()
    {
        return $this->hasOne(SageSubcategoria::className(), ['id' => 'id_subcategoria2']);
    }

    
}
