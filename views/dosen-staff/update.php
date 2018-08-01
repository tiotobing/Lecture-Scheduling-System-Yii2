<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DosenStaff */

$this->title = 'Update Dosen Staff: ' . $model->id_dosen_staff;
$this->params['breadcrumbs'][] = ['label' => 'Dosen Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dosen_staff, 'url' => ['view', 'id' => $model->id_dosen_staff]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosen-staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
