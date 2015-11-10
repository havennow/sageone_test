<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SageProduto */

$this->title = 'Editando Sage Produto: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sage Produto', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="sage-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'categoria_model'=>$categoria_model
    ]) ?>

</div>
