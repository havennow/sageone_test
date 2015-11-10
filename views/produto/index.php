<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SageProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sage Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
			 'attribute' => 'categoria1',
			 'label'=>'Categoria1',
			 'value' => 'idSubcategoria1.idCategoria.nome'
				
			 ],
			[
			 'attribute' => 'id_subcategoria1',
			 'value' => 'idSubcategoria1.nome',
			 'filter'=> '',
			 'enableSorting'=>false,
			
			 ],
            'unidade',
            'descricao:ntext',
            'custo',
            'codbarras',
            
             'moeda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
