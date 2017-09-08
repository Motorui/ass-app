<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormacoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_formacao',
            'nome_formacao',
            'sigla_formacao',
            'validade_formacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Criar Formações', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
