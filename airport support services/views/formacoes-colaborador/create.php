<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaborador */

$this->title = 'Create Formacoes Colaborador';
$this->params['breadcrumbs'][] = ['label' => 'Formacoes Colaboradors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-colaborador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
