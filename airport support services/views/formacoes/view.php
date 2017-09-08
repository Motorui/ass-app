<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */

$this->title = $model->nome_formacao;
$this->params['breadcrumbs'][] = ['label' => 'Formacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_formacao',
            'nome_formacao',
            'sigla_formacao',
            'validade_formacao',
        ],
    ]) ?>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_formacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_formacao], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar a Formação: "'.$model->nome_formacao.'" ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Nova', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
