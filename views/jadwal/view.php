<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$this->title = $model->id_jadwal;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
      if(Yii::$app->user->identity->id_role === 1){
        ?>



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jadwal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jadwal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
  }
  else {
    # code...   RAMOTI AU TUHAN
    }

 
     ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jadwal',
            'id_mk',
            'id_kelas',
            'id_ruangan',
            'jam_selesai',
            'jam_mulai',
            'hari',
            'sesi',
            'week',
            'tanggal',
        ],
    ]) ?>

</div>
