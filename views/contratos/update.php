<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contratos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contratos',
]) . $model->id_contrato;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contratos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contrato, 'url' => ['view', 'id' => $model->id_contrato]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contratos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
