<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SageCategoria */

$this->title = 'Editando Sage Categoria: ' . '# ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sage Categoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="sage-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
