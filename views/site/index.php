<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = $name;
?>
<div class="site-index">

   <div class="col-xs-12">
   <p>Bem vindo ao teste <?=$name?> - Guilherme Trevisan de Oliveira</p>
   <br/>
   <p><?=Html::a('Começar a importar', ['/converter'], ['class' => 'btn btn-primary']);?>
   </div>
   
</div>
