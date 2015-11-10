<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SageSubcategoria */

$this->title = 'Editando Sage Subcategoria: ' . '# ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sage Subcategoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="sage-subcategoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'categoria_model'=>$categoria_model
    ]) ?>

</div>
