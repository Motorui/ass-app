<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */

$this->title = 'Criar Formação';
$this->params['breadcrumbs'][] = ['label' => 'Formacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
