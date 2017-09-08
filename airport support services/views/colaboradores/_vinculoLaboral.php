<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\ContactosSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="vinculoLaboral-index">

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new ContactosSearch();
                    $searchModel->id_colaborador = $model->id_colaborador;
                    $dataProvider = $searchModel->searchContacto(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_contactos', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],        
            'num_pw',
            'num_cartao',
            'validade_cartao',
            'id_contrato',
            'inicio_contrato',
            'fim_contrato',
            'id_carga_horaria',
            'id_ccusto',
            'id_avenca',
        ],

    ]); ?>
</div>