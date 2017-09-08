<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resumo */

$this->title = $model->resumo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resumos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->resumo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->resumo_id], [
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
            'resumo_id',
            'resumo_mes',
            'total_total',
            'total_chegadas',
            'total_partidas',
            'total_36h',
            'chegadas_36h',
            'partidas_36h',
            'total_90m_36h',
            'chegadas_90m_36h',
            'partidas_90m_36h',
            'total_90m',
            'chegadas_90m',
            'partidas_90m',
        ],
    ]) ?>

</div>
