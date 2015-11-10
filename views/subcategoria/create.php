<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SageSubcategoria */

$this->title = 'Adicionar Subcategoria';
$this->params['breadcrumbs'][] = ['label' => 'Sage Subcategoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sage-subcategoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'categoria_model'=>$categoria_model
    ]) ?>

</div>
