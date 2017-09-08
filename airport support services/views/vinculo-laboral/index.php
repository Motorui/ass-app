<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VinculoLaboralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vinculos Laborais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculo-laboral-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'id_colaborador',
                'value' => 'idColaborador.nome_colaborador',
            ],
            'num_pw',
            'num_cartao',
            'validade_cartao',
            [
                'attribute' => 'id_contrato',
                'value' => 'idContrato.tipo_contrato',
            ],
            'inicio_contrato',
            'fim_contrato',
            [
                'attribute' => 'id_carga_horaria',
                'value' => 'idCargaHoraria.desc_carga_horaria',
            ],
            [
                'attribute' => 'id_ccusto',
                'value' => 'idCcusto.num_ccusto',
            ],
            // 'id_avenca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Criar Vinculo Laboral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
