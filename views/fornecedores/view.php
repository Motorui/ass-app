<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedores */

$this->title = $model->nome_fornecedor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fornecedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th width='15%'>{label}</th><td>{value}</td></tr>",
        'attributes' => [
            //'id_fornecedor',
            'nome_fornecedor',
            'morada_fornecedor',
            'contribuinte_fornecedor',
            'status_fornecedor',
            'data_criacao_fornecedor',
            'data_alteracao_fornecedor',
            //'user_id',
            [
            'label' => 'Criado/Editado por:',
                'attribute' => 'user.displayname'
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Atualizar'), ['update', 'id' => $model->id_fornecedor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Apagar'), ['delete', 'id' => $model->id_fornecedor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
