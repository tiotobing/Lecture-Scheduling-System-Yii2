<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Daftar Ruangan</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
      if(Yii::$app->user->identity->id_role === 1){
        ?>
        <p>
            <?= Html::a('Tambah Ruangan', ['create'], ['class' => 'btn btn-success']) ?>
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
          //  ['class' => 'yii\grid\SerialColumn'],

        //    'id_ruangan',
            'nama_ruangan',
            'kapasitas',
            'status',

            // 'id_bangunan',

            [
              'attribute' => 'id_bangunan',
              'label' => 'Bangunan',
              'value' => function($model){
                return $model->idBangunan->nama_bangunan;
              },
            ],

            ['class' => 'yii\grid\ActionColumn'],
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
            //  ['class' => 'yii\grid\SerialColumn'],

          //    'id_ruangan',
              'nama_ruangan',
              'kapasitas',
              'status',

              // 'id_bangunan',

              [
                'attribute' => 'id_bangunan',
                'label' => 'Bangunan',
                'value' => function($model){
                  return $model->idBangunan->nama_bangunan;
                },
              ],
          ],
      ]); ?>

      <?php
      }
       ?>





</div>
