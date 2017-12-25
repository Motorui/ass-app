<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TotalMensal */

$this->title = Yii::t('app', 'Create Total Mensal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Total Mensals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-mensal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
