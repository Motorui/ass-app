<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserCcusto */

$this->title = Yii::t('app', 'Atribuir centros de custo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acesso aos centros de custo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-ccusto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
