<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FormacoesColaboradorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="formacoes-colaborador-fc">

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if ($model->caducidade <= date("Y-m-d", strtotime("-3 months"))) {
                return ['class' => 'danger'];
            }
        },
        'columns' => [
            [
                'attribute'=>'id_formacao',
                'value'=>'idFormacao.nome_formacao',
            ],
            'data_formacao',
            'caducidade',
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>

