<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SageFornecedor */

$this->title = 'Editando Sage Fornecedor: ' . '# ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Sage Fornecedor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="sage-fornecedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
