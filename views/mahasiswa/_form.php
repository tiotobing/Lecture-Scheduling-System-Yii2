<?php
use app\models\Kelas;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <div class ="form-group">
        <?= Html::activeLabel($model, 'username' ,['class'=>'label-control']) ?>
        <?= Html::activeDropDownList($model, 'id_user', ArrayHelper::map(User::find()->all(),'id_user','username'),['class'=>'form-control']) ?>
    </div>


    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>





    <!-- UNTUK  COMPOSER  KARTIK\SELECT2\Select2   -->
      <?=$form->field($model,'id_kelas')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kelas::find()->all(),'id_kelas', 'nama_kelas'),
        'language' => 'en',
        'options' => ['placeholder' => '-Pilih Kelas-'],
        'pluginOptions' => [
            'allowClear' => true
        ],
      ]);
      ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
