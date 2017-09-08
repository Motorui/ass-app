<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ColaboradoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Colaboradores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Colaboradores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_colaborador',
            'nome_colaborador',
            'email_colaborador:email',
            'identificao_colaborador',
            'identificao_validade:date',
            // 'status_colaborador',
            // 'num_pw',
            // 'num_cartao',
            // 'validade_cartao:date',
            // 'id_contrato',
            // 'inicio_contrato:date',
            // 'fim_contrato:date',
            // 'id_carga_horaria',
            //'id_ccusto',
            // 'id_avenca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
