<?php

use yii\helpers\Html;
use app\models\User;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DosenStaff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <div class ="form-group">
        <?= Html::activeLabel($model, 'username' ,['class'=>'label-control']) ?>
        <?= Html::activeDropDownList($model, 'id_user', ArrayHelper::map(User::find()->all(),'id_user','username'),['class'=>'form-control']) ?>
    </div>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_sks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
