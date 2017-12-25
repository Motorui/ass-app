<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TotalMensal */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Total Mensal',
]) . $model->id_total_mensal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Total Mensals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_total_mensal, 'url' => ['view', 'id' => $model->id_total_mensal]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="total-mensal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
