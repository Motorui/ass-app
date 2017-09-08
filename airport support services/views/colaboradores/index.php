<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use app\models\VinculoLaboralSearch;
use app\models\ContactosSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColaboradoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colaboradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModelVinculoLaboral = new VinculoLaboralSearch();
                    $searchModelVinculoLaboral->id_colaborador = $model->id_colaborador;
                    $dataProviderVinculoLaboral = $searchModelVinculoLaboral->searchVinculoLaboral(Yii::$app->request->queryParams);

                    $searchModelContactos = new ContactosSearch();
                    $searchModelContactos->id_colaborador = $model->id_colaborador;
                    $dataProviderContactos = $searchModelContactos->searchContacto(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_detalhesGrid', [
                        'searchModelVinculoLaboral' => $searchModelVinculoLaboral,
                        'dataProviderVinculoLaboral' => $dataProviderVinculoLaboral,
                        'searchModelContactos' => $searchModelContactos,
                        'dataProviderContactos' => $dataProviderContactos,
                    ]);
                },
            ],
            'nome_colaborador',
            'email_colaborador:email',
            'identificao_colaborador',
            [
                'attribute'=>'identificao_validade',
                'value'=>'identificao_validade',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'identificao_validade',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d',
                            ]
                    ]),
            ],
            //'identificao_validade',
            // 'status_colaborador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <p>
        <?= Html::a('Criar Colaboradores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
