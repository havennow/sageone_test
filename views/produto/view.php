<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SageProduto */

$this->title = '#'.$model->codbarras;
$this->params['breadcrumbs'][] = ['label' => 'Sage Produto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja deletar este produto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
 			[
 			    'attribute'=>'Categoria1',
				'label'=>'Categoria 1',
 			    'value'=>$model->idSubcategoria1->idCategoria->nome,
 			],
 			[
 			    'attribute'=>'id_subcategoria1',
 			      'value'=>$model->idSubcategoria1->nome,
 			],
            'unidade',
            'descricao:ntext',
            'custo',
            'preco_venda1',
            'observacoes:ntext',
            'id_fornecedor',
            'estoque',
            'codbarras',
            'preco_venda2',
            'preco_venda3',
            'estoque_minimo',
            'estoque_maximo',
            'estoque_compra',
            'fator_unidade_venda',
            'ncm',
            'marca',
            'tamanho',
            'inativo',
            'tipo',
          
 			[
 			    'attribute'=>'Categoria2',
				'label'=>'Categoria 2',
 			    'value'=>$model->idSubcategoria2->idCategoria->nome,
 			],
 			[
 			    'attribute'=>'id_subcategoria2',
 			      'value'=>$model->idSubcategoria2->nome,
 			],
 			
            'composicao',
            'materia_prima',
            'material_expediente',
            'paravenda',
            'moeda',
        ],
    ]) ?>

</div>
