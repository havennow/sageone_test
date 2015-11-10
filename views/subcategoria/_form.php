<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SageSubcategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sage-subcategoria-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>


	 				 <?php
	                  echo $form->field($model, 'id_categoria')->dropDownList(
	                  ArrayHelper::map($categoria_model,'id','nome'),
	                  [ 
					   'prompt'=>'Selecione uma categoria',
	 				  ]);
	 				 ?>
					 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Incluir' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
