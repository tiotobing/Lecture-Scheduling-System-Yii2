<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widget\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Izin';
//
echo '<h1>Daftar Request Izin</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php
      if(Yii::$app->user->identity->id_role === 2){
        ?>
            <p>
                <?= Html::button('New Request', ['value'=>Url::to('index.php?r=request/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
            </p>
    <?php
      }

      else {

      ?>
      <?php
      }
      ?>

      

    <!-- Fungsi untuk Pop Up Form   -->
    <?php
        Modal::begin([
                'header'=>'<h1><center>Form Request Izin</center></h1>',
                'id' => 'modal',
                'size' => 'modal-lg',
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();
     ?>



     <?php
          if(Yii::$app->user->identity->id_role === 2){
      ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

            //    'id_request',

            [
              'attribute' => 'nama_lengkap',
              'label' => 'Nama',
              'value' => function($model){
                return $model->idDosenStaff->nama_lengkap;
              },
            ],


            'tanggal_req',

            // 'id_mk',
            [
              'attribute' => 'id_mk',
              'label' => 'Mata Kuliah',
              'value' => function($model){
                return $model->idMk->nama_mk;
              },
            ],

            // 'id_kelas',
            [
              'attribute' => 'id_kelas',
              'label' => 'Kelas',
              'value' => function($model){
                return $model->idKelas->nama_kelas;
              },
            ],

            //'hari',

            // 'id_ruangan',
            [
              'attribute' => 'id_kelas',
              'label' => 'Ruangan',
              'value' => function($model){
                return $model->idRuangan->nama_ruangan;
              },
            ],


            // ''
             [
               'attribute' => 'tanggal',
               'label' => 'Tanggal Izin',
             ],


          //   Status
            [  'attribute' => 'status',
              'label' => 'Status',
            ],

            // ['class' => 'yii\grid\ActionColumn',
            // 'template' => '{view} {delete} {update}'],

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
             ['class' => 'yii\grid\SerialColumn'],

              //    'id_request',

              [
                'attribute' => 'nama_lengkap',
                'label' => 'Nama',
                'value' => function($model){
                  return $model->idDosenStaff->nama_lengkap;
                },
              ],


              'tanggal_req',

              // 'id_mk',
              [
                'attribute' => 'id_mk',
                'label' => 'Mata Kuliah',
                'value' => function($model){
                  return $model->idMk->nama_mk;
                },
              ],

              // 'id_kelas',
              [
                'attribute' => 'id_kelas',
                'label' => 'Kelas',
                'value' => function($model){
                  return $model->idKelas->nama_kelas;
                },
              ],

              //'hari',

              // 'id_ruangan',
              [
                'attribute' => 'id_kelas',
                'label' => 'Ruangan',
                'value' => function($model){
                  return $model->idRuangan->nama_ruangan;
                },
              ],


              // ''
               [
                 'attribute' => 'tanggal',
                 'label' => 'Tanggal Izin',
               ],




              ['class' => 'yii\grid\ActionColumn',
              'template' => '{view}',
              'options' => ['style' => 'min-width:15]'],
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
