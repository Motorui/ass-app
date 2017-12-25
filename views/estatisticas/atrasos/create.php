<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atrasos */

$this->title = Yii::t('app', 'Create Atrasos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atrasos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atrasos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
