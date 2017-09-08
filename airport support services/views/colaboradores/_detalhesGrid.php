<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Colaboradores;
use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="vinculoLaboral-index">

    <?= GridView::widget([

        'dataProvider' => $dataProviderVinculoLaboral,
        'columns' => [
            // [
            //     'class' => 'kartik\grid\ExpandRowColumn',
            //     'value' => function($model, $key, $index, $column){
            //         return GridView::ROW_COLLAPSED;
            //     },
            //     'detail' => function($model, $key, $index, $column){
            //         $searchModel = new ContactosSearch();
            //         $searchModel->id_colaborador = $model->id_colaborador;
            //         $dataProvider = $searchModel->searchContacto(Yii::$app->request->queryParams);

            //         return Yii::$app->controller->renderPartial('_contactos', [
            //             'searchModel' => $searchModel,
            //             'dataProvider' => $dataProvider,
            //         ]);
            //     },
            // ],    
            'num_pw',
            'num_cartao',
            'validade_cartao',
             [
				'attribute' => 'id_contrato',
                'value' => 'idContrato.tipo_contrato'
			 ],
            'inicio_contrato',
            'fim_contrato',
            [
                'attribute' => 'id_carga_horaria',
                'value' => 'idCargaHoraria.desc_carga_horaria'
            ],
            [
                'attribute' => 'id_ccusto',
                'value' => 'idCcusto.nome_ccusto'
            ],
            //'id_avenca',
        ],

    ]); ?>
</div>
<div class="contactos-index">

    <?= GridView::widget([

        'dataProvider' => $dataProviderContactos,
        'columns' => [
            'contacto',
        
        ],

    ]); ?>
</div>