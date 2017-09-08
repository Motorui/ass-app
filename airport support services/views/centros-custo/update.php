<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = Yii::t('app', 'Atualizar: ') . $model->nome_ccusto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centros de Custo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_ccusto, 'url' => ['view', 'id' => $model->id_ccusto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="centros-custo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
