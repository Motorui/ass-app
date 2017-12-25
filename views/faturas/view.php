<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faturas */
$id_ccusto = Yii::$app->request->get('id_ccusto');

$this->title = $model->num_fatura;

if (null !==($id_ccusto)) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faturas'), 'url' => ['index', 'id_ccusto' => $id_ccusto]];
}else{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faturas'), 'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faturas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_fatura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_fatura], [
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
            //'id_fatura',
            'idCcusto.nome_ccusto',
            'tipo_fatura',
            'data_fatura',
            'idFornecedor.nome_fornecedor',           
            'num_fatura',
            'valor_fatura',
        ],
    ]) ?>

</div>
