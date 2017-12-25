<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = $model->nome_ccusto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centros de Custo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centros-custo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th width='15%'>{label}</th><td>{value}</td></tr>",
        'attributes' => [
            //'id_ccusto',
            'num_ccusto',
            'nome_ccusto',
            'created_at',
            'modified_at',
            [
            'label' => 'Criado/Editado por:',
                'attribute' => 'user.displayname'
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Atualiza'), ['update', 'id' => $model->id_ccusto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Apaga'), ['delete', 'id' => $model->id_ccusto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
