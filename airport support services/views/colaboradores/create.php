<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = Yii::t('app', 'Criar Colaborador');

    if ($id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto')){
        $url = ['index', 'id_ccusto' => $id_ccusto];
    }else{
        $url = ['index'];
    }

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => $url];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
