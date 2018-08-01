<?php
use app\models\Role;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <!-- <div class="form-group">
        <?= Html::activeLabel($model, 'id_role' ,['class'=>'label-control']) ?>
        <?= Html::activeDropDownList($model, 'id_role', ArrayHelper::map(Role::find()->all(),'id_role','role_name'),['class'=>'form-control']) ?>
    </div> -->

    <!-- UNTUK  COMPOSER  KARTIK\SELECT2\Select2   -->
      <?=$form->field($model,'id_role')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Role::find()->all(),'id_role', 'role_name'),
        'language' => 'en',
        'options' => ['placeholder' => '-Pilih Role-'],
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
