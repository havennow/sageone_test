<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SageProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sage-produto-form">

    <?php $form = ActiveForm::begin(); ?>
	 <?= Html::label('Categoria', 'categoria',['class'=>'control-label']) ?><br/>
     <?= Html::dropDownList('categoria', null,ArrayHelper::map($categoria_model,'id','nome'),
	 [
	 	  'id'=>'id_categoria1',
		  'class'=>'form-control',
		 'prompt'=>'Selecione uma categoria',
	 ]) ?>
	 			<br/>
			     <?php
			    echo $form->field($model, 'id_subcategoria1')->widget(DepDrop::classname(), [
			       
			         'pluginOptions'=>[
			             'depends'=>['id_categoria1'],
			  		    'loadingText' => 'Carregando...',
			             'placeholder' => 'Selecione a subcategoria',
			             'url' => Yii::$app->urlManager->createUrl(['/subcategoria/categorialist'])
			         ]
			     ]);
			  	?>	
					 
    <?= $form->field($model, 'unidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'custo')->textInput() ?>

    <?= $form->field($model, 'preco_venda1')->textInput() ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_fornecedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estoque')->textInput() ?>

    <?= $form->field($model, 'codbarras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_venda2')->textInput() ?>

    <?= $form->field($model, 'preco_venda3')->textInput() ?>

    <?= $form->field($model, 'estoque_minimo')->textInput() ?>

    <?= $form->field($model, 'estoque_maximo')->textInput() ?>

    <?= $form->field($model, 'estoque_compra')->textInput() ?>

    <?= $form->field($model, 'fator_unidade_venda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ncm')->textInput() ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tamanho')->textInput() ?>

    <?= $form->field($model, 'inativo')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>
	
 <?= Html::label('Categoria', 'categoria',['class'=>'control-label']) ?><br/>
    <?= Html::dropDownList('categoria', null,ArrayHelper::map($categoria_model,'id','nome'),
 [
 	  'id'=>'id_categoria2',
	  'class'=>'form-control',
	 'prompt'=>'Selecione uma categoria',
 ]) ?>
 			<br/>
		     <?php
		    echo $form->field($model, 'id_subcategoria2')->widget(DepDrop::classname(), [
		       
		         'pluginOptions'=>[
		             'depends'=>['id_categoria2'],
		  		    'loadingText' => 'Carregando...',
		             'placeholder' => 'Selecione a subcategoria',
		             'url' => Yii::$app->urlManager->createUrl(['/subcategoria/categorialist'])
		         ]
		     ]);
		  	?>


    <?= $form->field($model, 'composicao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'materia_prima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_expediente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paravenda')->textInput() ?>

    <?= $form->field($model, 'moeda')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Incluir' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
