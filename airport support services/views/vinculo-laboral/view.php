<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboral */

$this->title = $model->id_vinculo;
$this->params['breadcrumbs'][] = ['label' => 'Vinculo Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculo-laboral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_vinculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_vinculo], [
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
            'id_vinculo',
            'id_colaborador',
            'num_pw',
            'num_cartao',
            'validade_cartao',
            'id_contrato',
            'inicio_contrato',
            'fim_contrato',
            'id_carga_horaria',
            'id_ccusto',
            'id_avenca',
        ],
    ]) ?>

</div>
