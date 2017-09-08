<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CargaHoraria */

$this->title = 'Criar Carga Horária';
$this->params['breadcrumbs'][] = ['label' => 'Carga Horarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-horaria-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
