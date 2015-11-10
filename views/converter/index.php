<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<div class="converter-form col-xs-12">
	<h3> Importação de arquivo </h3>
	<?php
	foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
	echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
	}
	?>

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>



    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
