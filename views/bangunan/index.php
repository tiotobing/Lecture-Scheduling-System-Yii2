<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BangunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
echo '<h1>Daftar Bangunan</h1><hr>';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bangunan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bangunan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bangunan',
            'nama_bangunan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
