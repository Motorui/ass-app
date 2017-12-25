<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atrasos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Atrasos',
]) . $model->id_atraso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atrasos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_atraso, 'url' => ['view', 'id' => $model->id_atraso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atrasos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
