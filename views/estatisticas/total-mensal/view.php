<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TotalMensal */

$this->title = $model->id_total_mensal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Total Mensals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-mensal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_total_mensal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_total_mensal], [
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
            'id_total_mensal',
            'ano',
            'janeiro',
            'fevereiro',
            'marco',
            'abril',
            'maio',
            'junho',
            'julho',
            'agosto',
            'setembro',
            'outubro',
            'novembro',
            'dezembro',
        ],
    ]) ?>

</div>
