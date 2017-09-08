<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserCcusto */

$this->title = Yii::t('app', 'Create User Ccusto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Ccustos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-ccusto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
