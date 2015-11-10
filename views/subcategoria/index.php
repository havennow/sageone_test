<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SageSubcategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sage Subcategoria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-subcategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Subcategoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
			    'attribute'=>'id_categoria',
			    'value'=>'idCategoria.nome',
   			 'filter'=> '',
   			 'enableSorting'=>false,
			],
			
			
            'nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
