<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SageFornecedor */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Sage Fornecedor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-fornecedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja deletar este fornecedor?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         
            'nome',
            'endereco',
            'contato',
        ],
    ]) ?>

</div>
