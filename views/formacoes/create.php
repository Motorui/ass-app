<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */

$this->title = Yii::t('app', 'Create Formacoes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
