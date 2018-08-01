<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\controllers\RequestController;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

echo "<h3>Detail Request Izin</h3>";
// $this->title = $model->id_request;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <?php
      if(Yii::$app->user->identity->id_role === 2){
        ?>

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id_request], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_request], [
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
      ?>

      <?php
      }
      ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_request',
            'tanggal_req',
            // 'id_user',
            [
                'attribute' => 'idDosenStaff',
                'label' => 'Nama Dosen',
                'value' => function($model){
                  return $model->idDosenStaff->nama_lengkap;
                },
            ],

            [
                'attribute' => 'id_mk',
                'label' => 'Izin Pada Mata Kuliah',
                'value' => function($model){
                  return $model->idMk->nama_mk;
                },
            ],

            [
                'attribute' => 'idKelas',
                'label' => 'Kelas',
                'value' => function($model){
                  return $model->idKelas->nama_kelas;
                },
            ],

            [
                'attribute' => 'id_ruangan',
                'label' => 'Ruangan',
                'value' => function($model){
                  return $model->idRuangan->nama_ruangan;
                },
            ],

            'hari',

            [
              'attribute'=> 'tanggal',
              'label' => 'Tanggal Izin',
              'tanggal',
            ],


            'alasan:ntext',

            'status'
        ],
    ]) ?>

    <?php
    if(Yii::$app->user->identity->id_role === 1) { ?>

    <div>
          <?= Html::a('Ubah Jadwal', ['/jadwal'], ['class' => 'btn btn-primary']) ?>
      </div>

      <?php
      echo '<br>';
      //apabila sudah mengklik submit
            if(isset($_POST['verifikasi']))
            {
              //membuat objek pemesanandao
              $pesanan = new PemesananDao();
              //menginvoke mwthod updatepemesanan
              $pesanan->updateStatus($_POST['username']);
              //masuk ke halaman homeadmin
              header("location: index.php");
            }
          ?>


  <!--membuat halaman untuk memverifikasi -->
    <section>
      <div id="login">
      <form action="" method="post">
        <label>Masukkan : </label>
        <input id="id Request" name="id_request" placeholder="ID Request" type="text">
        <input id="Login" name="submit" type="submit" value="verifikasi">
      </form>
      </div>
    </section>

      <?php
    }
    else {
    }
    ?>






</div>
