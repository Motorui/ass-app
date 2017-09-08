<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faturas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Faturas',
]) . $model->num_fatura;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fatura, 'url' => ['view', 'id' => $model->id_fatura]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faturas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
