<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Avencas */

$this->title = 'Create Avencas';
$this->params['breadcrumbs'][] = ['label' => 'Avencas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avencas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
