<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SageFornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sage Fornecedor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-fornecedor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Fornecedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'nome',
            'endereco',
            'contato',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
