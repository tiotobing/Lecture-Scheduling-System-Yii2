<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RuanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ruangan') ?>

    <?= $form->field($model, 'nama_ruangan') ?>

    <?= $form->field($model, 'kapasitas') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'id_bangunan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
