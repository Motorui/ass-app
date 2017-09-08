<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CargaHoraria */

$this->title = $model->desc_carga_horaria;
$this->params['breadcrumbs'][] = ['label' => 'Carga Horarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-horaria-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_carga_horaria',
            'desc_carga_horaria',
            'horas_carga_horaria',
        ],
    ]) ?>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_carga_horaria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_carga_horaria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar a Carga Horária: "'.$model->desc_carga_horaria.'" ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Nova', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
