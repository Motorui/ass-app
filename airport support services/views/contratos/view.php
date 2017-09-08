<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contratos */

$this->title = $model->tipo_contrato;
$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratos-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_contrato',
            'tipo_contrato',
        ],
    ]) ?>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_contrato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_contrato], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar o tipo de contracto: "'.$model->tipo_contrato.'" ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
