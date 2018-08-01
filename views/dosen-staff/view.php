<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DosenStaff */

$this->title = $model->id_dosen_staff;
$this->params['breadcrumbs'][] = ['label' => 'Dosen Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dosen_staff], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dosen_staff], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_dosen_staff',
            'id_user',
            'nama_lengkap',
            'nidn',
            'jenis_kelamin',
            'email:email',
            'jumlah_sks',
        ],
    ]) ?>

</div>
