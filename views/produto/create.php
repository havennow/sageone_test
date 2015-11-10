<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SageProduto */

$this->title = 'Adicionar Produto';
$this->params['breadcrumbs'][] = ['label' => 'Sage Produto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'categoria_model'=>$categoria_model,
    ]) ?>

</div>
