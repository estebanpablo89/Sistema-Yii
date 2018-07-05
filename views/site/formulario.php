<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Formulario de Datos';
?>

<?php if(Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger" role="alert">
        No se pudo validar el modelo, los errores fueron: <?print_r($model->errors, true)?>
    </div>
<?php endif;?>

<?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'nombre'); ?>
    <?= $form->field($model, 'apellido'); ?>
    <?= $form->field($model, 'edad'); ?>
    <?= $form->field($model, 'correo'); ?>
    <?= Html::submitButton('Enviar',['class'=>'btn btn-primary']);?>
<?php $form = ActiveForm::end();?>
