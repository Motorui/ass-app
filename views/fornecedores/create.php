<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fornecedores */

$this->title = Yii::t('app', 'Create Fornecedores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fornecedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
