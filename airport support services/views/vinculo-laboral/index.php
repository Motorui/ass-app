<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VinculoLaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vinculo Laborals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculo-laboral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vinculo Laboral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vinculo',
            'id_colaborador',
            'num_pw',
            'num_cartao',
            'validade_cartao',
            // 'id_contrato',
            // 'inicio_contrato',
            // 'fim_contrato',
            // 'id_carga_horaria',
            // 'id_ccusto',
            // 'id_avenca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
