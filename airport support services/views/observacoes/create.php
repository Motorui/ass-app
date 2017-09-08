<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Observacoes */

$this->title = 'Create Observacoes';
$this->params['breadcrumbs'][] = ['label' => 'Observacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="observacoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
