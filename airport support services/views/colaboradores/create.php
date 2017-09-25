<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = Yii::t('app', 'Novo Colaborador:');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
