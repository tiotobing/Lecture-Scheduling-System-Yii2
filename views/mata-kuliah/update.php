<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MataKuliah */

$this->title = 'Update Mata Kuliah: ' . $model->id_mk;
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mk, 'url' => ['view', 'id' => $model->id_mk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mata-kuliah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
