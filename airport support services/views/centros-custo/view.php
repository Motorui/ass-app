<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = $model->nome_ccusto;
$this->params['breadcrumbs'][] = ['label' => 'Centros Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centros-custo-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_ccusto',
            'num_ccusto',
            'nome_ccusto',
        ],
    ]) ?>
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_ccusto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_ccusto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar o Centro de Custo: "'.$model->nome_ccusto.'" ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
