<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contratos */

$this->title = 'Criar tipo de Contrato';
$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratos-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
