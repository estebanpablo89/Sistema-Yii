<?php

use yii\helpers\Html;

$this->title = 'Confirmación de Envío';
?>

<h1>La información enviada fue:</h1>

<ul>
    <li>
        <label><?=$model->getAttributeLabel('nombre')?> </label>:
        <?= Html::encode($model->nombreCompleto);?>
    </li>
    <li>
        <label><?=$model->getAttributeLabel('edad')?> </label>:
        <?= Html::encode($model->edad);?>
    </li>
    <li>
        <label><?=$model->getAttributeLabel('correo')?> </label>:
        <?= Html::encode($model->correo);?>
    </li>
</ul>