<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SageProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sage-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_subcategoria1') ?>

    <?= $form->field($model, 'unidade') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'custo') ?>

    <?php // echo $form->field($model, 'preco_venda1') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'id_fornecedor') ?>

    <?php // echo $form->field($model, 'estoque') ?>

    <?php // echo $form->field($model, 'codbarras') ?>

    <?php // echo $form->field($model, 'preco_venda2') ?>

    <?php // echo $form->field($model, 'preco_venda3') ?>

    <?php // echo $form->field($model, 'estoque_minimo') ?>

    <?php // echo $form->field($model, 'estoque_maximo') ?>

    <?php // echo $form->field($model, 'estoque_compra') ?>

    <?php // echo $form->field($model, 'fator_unidade_venda') ?>

    <?php // echo $form->field($model, 'ncm') ?>

    <?php // echo $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'tamanho') ?>

    <?php // echo $form->field($model, 'inativo') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'id_subcategoria2') ?>

    <?php // echo $form->field($model, 'composicao') ?>

    <?php // echo $form->field($model, 'materia_prima') ?>

    <?php // echo $form->field($model, 'material_expediente') ?>

    <?php // echo $form->field($model, 'paravenda') ?>

    <?php // echo $form->field($model, 'moeda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
