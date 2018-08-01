<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\MataKuliah;
use app\models\Kelas;
use app\models\Ruangan;
use yii\helpers\ArrayHelper;
// use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */

// Var Date
$date = date("Y-m-d h:i:s");

?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>


     <?= $form->field($model, 'id_user')->textInput(['readonly'=> true, 'value'=>Yii::$app->user->identity->id_user]) ?>

     <?= $form->field($model, 'tanggal_req')->hiddenInput(['value' => $date])->label(false) ?>


<!--  UNTUK DEPENDENT DROP DOWN Otomatis -->

    <?= $form->field($model,'id_kelas')->label('Kelas')->dropDownList(
        ArrayHelper::map(Kelas::find()->all(),'id_kelas','nama_kelas'),
        [
          'prompt' => '-Pilih Kelas-',
          'onchange'=>'
          $.post( "index.php?r=mata-kuliah/lists&id='.'"+$(this).val(), function( data ) {
             $( "select#request-id_mk" ).html( data );
           });'

        ]); ?>


     <?= $form->field($model,'id_mk')->label('Mata Kuliah')->dropDownList(
         ArrayHelper::map( MataKuliah::find()->all(), 'id_mk', 'nama_mk'),
         [
           'prompt' => '-Pilih Mata Kuliah-',

         ]); ?>








    <div class="form-group">
        <?= Html::activeLabel($model, 'Ruangan' ,['class'=>'label-control']) ?>
        <?= Html::activeDropDownList($model, 'id_ruangan', ArrayHelper::map(Ruangan::find()->all(),'id_ruangan','nama_ruangan'),['class'=>'form-control']) ?>
    </div>

    <?= $form->field($model, 'hari')->dropDownList([ 'Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu' ], ['prompt' => '-Pilih Hari-']) ?>

    <!-- <?= $form->field($model, 'tanggal')->textInput() ?> -->
    <?= $form->field($model, 'tanggal')->widget(
       DatePicker::className(),[
           'inline' => false,
           'clientOptions' => [
               'autoclose' => true,
               'format' => 'yyyy-m-d'
           ]
       ]
   ) ?>

    <?= $form->field($model, 'alasan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['readonly'=> true, 'value'=> 'Belum Diverifikasi']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
