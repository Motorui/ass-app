<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Formacoes',
]) . $model->id_formacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_formacao, 'url' => ['view', 'id' => $model->id_formacao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="formacoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
