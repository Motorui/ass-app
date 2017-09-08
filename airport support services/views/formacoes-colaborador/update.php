<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaborador */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Formacoes Colaborador',
]) . $model->id_fc;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formacoes Colaboradors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fc, 'url' => ['view', 'id' => $model->id_fc]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="formacoes-colaborador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
