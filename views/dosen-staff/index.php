<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widget\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DosenStaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Dosen / Staff</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php
         if(Yii::$app->user->identity->id_role === 1){
     ?>

    <p>
        <?= Html::button('Tambah Dosen-Staff', ['value'=>Url::to('index.php?r=dosen-staff/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>
    <?php
  }
  else {
    # code...
  }
     ?>

    <!-- Fungsi untuk Pop Up Form   -->
    <?php
        Modal::begin([
                'header'=>'<h3>Form Tambah Dosen-Staff</h3>',
                'id' => 'modal',
                'size' => 'modal-lg',
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();

     ?>


     <?php
          if(Yii::$app->user->identity->id_role === 1){
      ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'Menampilkan <b>{begin} - {end} dari {totalCount}</b>',

        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

          //  'id_dosen_staff',
          //   'id_user',

              [
                'attribute' => 'username',
                'label' => 'Username',

                'value' => function($model){
                  return $model->idUser->username;
                },
              ],

            'nama_lengkap',
            'nidn',
            'jenis_kelamin',
            'email:email',
            // 'jumlah_sks',


            ['class' => 'yii\grid\ActionColumn',
               'options' => ['style' => 'min-width:15%;'],
               'template'  => '{view} {update} {delete}',
                'buttons' => [
                   'view' => function ($url, $model) {
                                      return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', ['/dosen-staff/detail','id'=>$model->id_dosen_staff], [
                                                              'title' => Yii::t('app', 'Detail'),
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
                                                                           'title' => Yii::t('app', 'Delete'),
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
              'summary' => 'Menampilkan <b>{begin} - {end} dari {totalCount}</b>',

              'columns' => [
                //  ['class' => 'yii\grid\SerialColumn'],

                //  'id_dosen_staff',
                //   'id_user',

                    [
                      'attribute' => 'username',
                      'label' => 'Username',

                      'value' => function($model){
                        return $model->idUser->username;
                      },
                    ],

                  'nama_lengkap',
                  'nidn',
                  'jenis_kelamin',
                  'email:email',
                  // 'jumlah_sks',


                  ['class' => 'yii\grid\ActionColumn',
                     'options' => ['style' => 'min-width:15%;'],
                     'template'  => '{view}  ',
                      'buttons' => [
                         'view' => function ($url, $model) {
                                            return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', ['/dosen-staff/detail','id'=>$model->id_dosen_staff], [
                                                                    'title' => Yii::t('app', 'Detail'),
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
