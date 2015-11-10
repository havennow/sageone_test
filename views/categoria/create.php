<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SageCategoria */

$this->title = 'Adicionar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Sage Categoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'categoria_model'=>$categoria_model
    ]) ?>

</div>
