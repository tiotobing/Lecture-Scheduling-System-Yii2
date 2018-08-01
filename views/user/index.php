<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widget\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Daftar User</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::button('Tambah User', ['value'=>Url::to('index.php?r=user/create'),'class' => 'btn btn-success', 'id'=>'modalButton'])?>

    </p>

<!--Fungsi untuk pop up Form -->

    <?php
        Modal::begin([
                'header'=>'<h1>Form Tambah User</h1>',
                'id' => 'modal',
                'size' => 'modal-lg',
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        //    ['class' => 'yii\grid\SerialColumn'],


           'id_user',
            // [
            //   'attribute' => 'id_user',
            //   'label' => 'Nama User',
            //   'value' => function($model){
            //     return $model->tMahasiswas->id_user;
            //   },
            // ],

            'username',
            'password',
          //  'id_role',

            [
              'attribute' => 'id_role',
              'label' => 'Role User',
              'value' => function($model){
                return $model->idRole->role_name;
              },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
