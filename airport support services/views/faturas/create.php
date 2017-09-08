<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faturas */

$this->title = Yii::t('app', 'Adicionar Faturas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faturas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
