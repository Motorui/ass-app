<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use app\models\FormacoesColaboradorSearch;
use app\models\ColaboradorSearch;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormacoesColaboradorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

    if (!$id_ccusto) {
            $urlCreate = (Html::a(Yii::t('app', 'Atribuir Formações'),
            ['create'],
            ['class' => 'btn btn-success']));

            $nome_ccusto = 'Formações - Geral';
    }else{
        $urlCreate = (Html::a(Yii::t('app', 'Atribuir Formações'),
            ['formacoes-colaborador/create', 'id_ccusto' => $id_ccusto],
            ['class' => 'btn btn-success']));

        $ccusto = CentrosCusto::findOne(['id_ccusto' => $id_ccusto]);
        $nome_ccusto = $ccusto->nome_ccusto;

    };

$this->title = Yii::t('app', 'Formações - Colaboradores '.$nome_ccusto);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacoes-colaborador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataC,
        'filterModel' => $searchC,
        'columns' => [
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $index, $column){
                    $searchFc = new FormacoesColaboradorSearch();
                    $searchFc->id_colaborador = $model->id_colaborador;
                    $dataFc = $searchFc->search(Yii::$app->request->queryParams);

                    return yii::$app->controller->renderPartial('_fc', [
                        'searchModel'=>$searchFc,
                        'dataProvider'=>$dataFc,
                    ]);
                },
            ],
            'nome_colaborador',
            'num_pw',
            'num_cartao',
            'email_colaborador:email',
            'status_colaborador',
        ],
    ]); ?>
<?php Pjax::end(); ?>

    <p>
        <?= $urlCreate ?>
    </p>
    
</div>
