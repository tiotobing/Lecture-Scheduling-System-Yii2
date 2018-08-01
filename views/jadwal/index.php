<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Jadwal Perkuliahan</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
      if(Yii::$app->user->identity->id_role === 1){
        ?>
        <p>
            <?= Html::a('Create Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
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
          //   ['class' => 'yii\grid\SerialColumn'],

          //  'id_jadwal',
            'hari',
            'sesi',

            [
              'attribute' => 'id_mk',
              'label' => 'Mata Kuliah',

            ],

            [
              'attribute' => 'id_kelas',
              'label' => 'Kelas',

            ],
            [
              'attribute' => 'id_ruangan',
              'label' => 'Ruangan',

            ],



            [
              'attribute' => 'd1',
              'label' => 'Dosen Pengampuh',

            ],
          //  'd2',
            'jam_mulai',
            'jam_selesai',
            [
              'attribute' => 'jenis',
              'label' => 'Keterangan',

            ],
        //    'week',
        //    'tanggal',

        ['class' => 'yii\grid\ActionColumn',
           'template'  => '{view} {update} {delete}',
           'options' => ['style' => 'min-width:16%;'],
            'buttons' => [
               'view' => function ($url, $model) {
                                  return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', $url, [
                                                          'title' => Yii::t('app', 'View'),
                                  ]
                              );
                          },
                'update' => function ($url, $model) {
                                   return Html::a('<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>', $url, [
                                                           'title' => Yii::t('app', 'Edit'),
                                   ]
                               );
                           },
                'delete' => function ($url, $model) {
                                    return Html::a('<button class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></button>', $url, [
                                                            'title' => Yii::t('app', 'Edit'),
                                  ]
                              );
                          },
            ],
       ],

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
         //   ['class' => 'yii\grid\SerialColumn'],

         //  'id_jadwal',
           'hari',
           'sesi',

           [
             'attribute' => 'id_mk',
             'label' => 'Mata Kuliah',

           ],

           [
             'attribute' => 'id_kelas',
             'label' => 'Kelas',

           ],
           [
             'attribute' => 'id_ruangan',
             'label' => 'Ruangan',

           ],

           [
             'attribute' => 'd1',
             'label' => 'Dosen Pengampuh',

           ],
         //  'd2',
           'jam_mulai',
           'jam_selesai',
           [
             'attribute' => 'jenis',
             'label' => 'Keterangan',

           ],
       //    'week',
       //    'tanggal',

       ['class' => 'yii\grid\ActionColumn',
          'template'  => '{view} ',
          'options' => ['style' => 'min-width:16%;'],
           'buttons' => [
              'view' => function ($url, $model) {
                                 return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', $url, [
                                                         'title' => Yii::t('app', 'View'),
                                 ]
                             );
                         },

           ],
      ],

    ],


  ]); ?>
  <?php
  }
  ?>



</div>
