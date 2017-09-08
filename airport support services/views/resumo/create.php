<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resumo */

$this->title = Yii::t('app', 'Create Resumo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resumos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
