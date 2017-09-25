<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = Yii::t('app', 'Atualizar Colaborador: ', [
    'modelClass' => 'Colaboradores',
]) . $model->nome_colaborador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_colaborador, 'url' => ['view', 'id' => $model->id_colaborador]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="colaboradores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
