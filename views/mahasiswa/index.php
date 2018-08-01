<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widget\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Mahasiswa</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Tambah Mahasiswa', ['value'=>Url::to('index.php?r=mahasiswa/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>

    <!-- Fungsi untuk Pop Up Form   -->
    <?php
        Modal::begin([
                'header'=>'<h3>Form Tambah Mahasiswa</h3>',
                'id' => 'modal',
                'size' => 'modal-lg',
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();

     ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'Menampilkan <b>{begin} - {end} dari {totalCount}</b>',
        'columns' => [
        //    ['class' => 'yii\grid\SerialColumn'],

          //  'id_mahasiswa',
          //  'id_user',
          [
            'attribute' => 'username',
            'label' => 'Username',
            'value' => function($model){
              return $model->idUser->username;
            },
          ],


            'nim',
            'nama_lengkap',
            // 'id_kelas',

            [
              'attribute' => 'id_kelas',
              'label' => 'Kelas',
              'value' => function($model){
                return $model->idKelas->nama_kelas;
              },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
