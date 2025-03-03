<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Doctores */

$this->title = $model->doctor_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->doctor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->doctor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'doctor_id',
            'nombre',
            'apellidos',
            'especialidad',
            'usuario_asignado',
            'usuario_creacion',
            'usuario_modificacion',
            'fecha_creacion',
            'fecha_modificacion',
        ],
    ]) ?>

</div>
