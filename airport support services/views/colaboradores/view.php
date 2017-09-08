<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = $model->nome_colaborador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_colaborador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_colaborador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_colaborador',
            'nome_colaborador',
            'email_colaborador:email',
            'identificao_colaborador',
            'identificao_validade:date',
            'status_colaborador',
            'num_pw',
            'num_cartao',
            'validade_cartao:date',
            'id_contrato',
            'inicio_contrato:date',
            'fim_contrato:date',
            'id_carga_horaria',
            'id_ccusto',
            'id_avenca',
        ],
    ]) ?>

</div>
