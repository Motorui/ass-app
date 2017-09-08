<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = 'Criar Colaborador';
$this->params['breadcrumbs'][] = ['label' => 'Colaboradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsContactos' => $modelsContactos,
    ]) ?>

</div>
