<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\CentrosCusto;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCcustoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Acesso aos centros de custo');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-ccusto-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php

    Pjax::begin();

        echo GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'showPageSummary'=>false,
            'export' => false,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'Acesso aos centros de custo'],
            'columns'=>[
                //['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'id_user', 
                    'width'=>'310px',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->idUser->displayname;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(User::find()->orderBy('id')->asArray()->all(), 'id', 'displayname'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Utilizador'],
                    'group'=>true,  // enable grouping,
                    'groupedRow'=>true,                    // move grouped column to a single grouped row
                    'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                    'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
                ],
                [
                    'attribute'=>'id_ccusto', 
                    'width'=>'250px',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->idCcusto->nome_ccusto;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(CentrosCusto::find()->orderBy('id_ccusto')->asArray()->all(), 'id_ccusto', 'nome_ccusto'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Centro de Custo'],
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                'class' => 'kartik\grid\ActionColumn',
                ],
            ],
        ]);

    Pjax::end(); 
?>

    <p>
        <?= Html::a(Yii::t('app', 'Adicionar centro de custo a utilizador'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
