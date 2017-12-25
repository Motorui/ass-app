<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atrasos */

$this->title = $model->id_atraso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atrasos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atrasos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_atraso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_atraso], [
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
            'id_atraso',
            'data_atraso',
            'cia',
            'num_voo',
            'tipo_atraso',
            'min_imputados',
            'fora_sta',
            'voo_rotacao',
            'un_pen',
            'nao_refutado',
            'min_aceites',
            'observacoes',
        ],
    ]) ?>

</div>
