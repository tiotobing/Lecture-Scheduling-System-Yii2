<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Modal;


$this->title = 'Detail Dosen/Staff :'  .   $model-> nama_lengkap ;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title')
        var href = button.attr('href')
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
?>

<div class="dosen-staff-view">
  <div class='box box-primary color-palette-box'>
   <div class='box-header'>
     <h3 class='box-title'><i class="fa fa-university"></i> <?= $this->title ?></h3>
     <div class="box-tools pull-right">
       <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id_dosen_staff], ['class' => 'btn btn-primary']) ?>
       <button class="btn btn-default" data-widget="collapse"><i class="fa fa-minus"></i></button>
     </div>
   </div>
   <div class='box-body'>
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
   </div><!-- /.box-body -->
 </div><!-- /.box -->


 <div class="mata-kuliah-view">
   <div class='box box-danger color-palette-box'>
    <div class='box-header'>
      <h3 class='box-title'><i class="fa fa-bars"></i> Daftar Mata Kuliah</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-default" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class='box-body table-responsive'>
              <?= GridView::widget([
                   'dataProvider' => $dataProviderMk,
                   'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                          [
                              'attribute' => 'kode_mk',
                              'header'=>'Kode Matkul',
                              'value' => 'kode_mk'
                          ],
                          [
                              'attribute' => 'nama_mk',
                              'header'=>'Mata Kuliah',
                              'value' => 'nama_mk'
                          ],


                          [
                              'attribute' => 'id_dosen',
                              'label' => 'Dosen Pengampuh',
                              'value' => function($model){
                                return $model->idDosen->nama_lengkap;
                              },
                          ],

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
                                    </div><!-- /.box-body -->
                                  </div><!-- /.box -->
                              </div>
 <?php
Modal::begin([
    'id' => 'myModal',
    'header' => '<h4 class="modal-title">...</h4>',
]);

echo '...';

Modal::end();
?>
