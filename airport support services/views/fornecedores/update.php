<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedores */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fornecedores',
]) . $model->id_fornecedor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fornecedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fornecedor, 'url' => ['view', 'id' => $model->id_fornecedor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fornecedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
