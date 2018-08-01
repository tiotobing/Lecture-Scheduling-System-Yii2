<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_request') ?>

    <?= $form->field($model, 'tanggal_req') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_mk') ?>

    <?= $form->field($model, 'id_kelas') ?>

    <?= $form->field($model, 'id_ruangan') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'hari') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'alasan') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
