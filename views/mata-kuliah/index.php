<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MataKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Daftar Mata Kuliah</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
      if(Yii::$app->user->identity->id_role === 1){
        ?>

    <p>
        <?= Html::a('Create Mata Kuliah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
      }

      else {

      ?>
      <?php
      }
      ?>



      <?php
           if(Yii::$app->user->identity->id_role === 1){
       ?>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

        //    'id_mk',
            'kode_mk',
            // 'id_kelas',
            [
              'attribute' => 'id_kelas',
              'label' => 'Kelas',
              'value' => function($model){
                return $model->idKelas->nama_kelas;
              },
            ],

            'nama_mk',
            // 'id_dosen',
            [
              'attribute' => 'id_dosen',
              'label' => 'Dosen Pengampuh',
              'value' => function($model){
                return $model->idDosen->nama_lengkap;
              },
            ],


            ['class' => 'yii\grid\ActionColumn',
             'template'  => '{view} {update} {delete}'],

        ],
    ]); ?>

    <?php
    }
    else {
      ?>

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
             ['class' => 'yii\grid\SerialColumn'],

          //    'id_mk',
              'kode_mk',
              // 'id_kelas',
              [
                'attribute' => 'id_kelas',
                'label' => 'Kelas',
                'value' => function($model){
                  return $model->idKelas->nama_kelas;
                },
              ],

              'nama_mk',
              // 'id_dosen',
              [
                'attribute' => 'id_dosen',
                'label' => 'Dosen Pengampuh',
                'value' => function($model){
                  return $model->idDosen->nama_lengkap;
                },
              ],


              ['class' => 'yii\grid\ActionColumn',
               'template'  => '{view} '],

          ],
      ]); ?>

      <?php
      }
      ?>

</div>
