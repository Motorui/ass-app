<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Parques */

$this->title = 'Criar Parque';
$this->params['breadcrumbs'][] = ['label' => 'Parques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parques-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
