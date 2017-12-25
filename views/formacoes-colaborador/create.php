<?php

use yii\helpers\Html;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaborador */

$this->title = Yii::t('app', 'Atribuir Formações');

    if ($id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto')){
        $url = ['index', 'id_ccusto' => $id_ccusto];
        $ccusto = CentrosCusto::findOne(['id_ccusto' => $id_ccusto]);
        $nome_ccusto = $ccusto->nome_ccusto;
    }else{
        $url = ['index'];
        $nome_ccusto = 'Formações - Geral';
    }

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formações - '.$nome_ccusto), 'url' => $url];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-colaborador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
