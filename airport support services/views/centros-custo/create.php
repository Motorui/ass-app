<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = 'Criar Centro de Custo';
$this->params['breadcrumbs'][] = ['label' => 'Centros Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centros-custo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
