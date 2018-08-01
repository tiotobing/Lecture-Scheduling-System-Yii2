<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Daftar Kelas</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
         if(Yii::$app->user->identity->id_role === 1){
     ?>

    <p>
        <?= Html::a('Create Kelas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    }
    else {
      # code...  //echo "Admin009"
    }   ?>



    <?php
         if(Yii::$app->user->identity->id_role === 1){
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id_kelas',

                    [
                        'attribute' => 'id_prodi',
                        'label' => 'Program Studi',
                        'value' => function($model){
                          return $model->idProdi->nama_prodi;
                        },
                    ],

            'nama_kelas',

            ['class' => 'yii\grid\ActionColumn',
               'options' => ['style' => 'min-width:15%;'],
               'template'  => '{view} {update} {delete}',
                'buttons' => [
                   'view' => function ($url, $model) {
                                      return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', ['/kelas/detail','id'=>$model->id_kelas], [
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

            //  'id_kelas',

                      [
                          'attribute' => 'id_prodi',
                          'label' => 'Program Studi',
                          'value' => function($model){
                            return $model->idProdi->nama_prodi;
                          },
                      ],

              'nama_kelas',

              ['class' => 'yii\grid\ActionColumn',
                 'options' => ['style' => 'min-width:15%;'],
                 'template'  => '{view}',
                  'buttons' => [
                     'view' => function ($url, $model) {
                                        return Html::a('<button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>', ['/kelas/detail','id'=>$model->id_kelas], [
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
