<?php
use app\models\Bangunan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ruangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_ruangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kapasitas')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'id_bangunan')->textInput() ?> -->

    <div class="form-group">
        <?= Html::activeLabel($model, 'Bangunan' ,['class'=>'label-control']) ?>
        <?= Html::activeDropDownList($model, 'id_bangunan', ArrayHelper::map(Bangunan::find()->all(),'id_bangunan','nama_bangunan'),['class'=>'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
