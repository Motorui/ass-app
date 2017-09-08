<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboral */

$this->title = 'Create Vinculo Laboral';
$this->params['breadcrumbs'][] = ['label' => 'Vinculo Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculo-laboral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
