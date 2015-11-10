<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SageSubcategoria */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Sage Subcategoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-subcategoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja deletar está sub-categoria?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'id_categoria',
            'nome',
        ],
    ]) ?>

</div>
