<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FornecedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fornecedores:');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Criar Fornecedor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_fornecedor',
            'nome_fornecedor',
            //'morada_fornecedor',
            'contribuinte_fornecedor',
            'status_fornecedor',
            // 'data_criacao_fornecedor',
            // 'data_alteracao_fornecedor',
            // [
            // 'header' => 'Criado/Editado por:',
            // 'attribute' => 'user.displayname'
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions'=>function($model){
            if($model->status_fornecedor <> 'ativo' ){
                return ['class' => 'danger'];
            }
        },  
    ]); ?>
<?php Pjax::end(); ?></div>
