<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DosenStaff */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
