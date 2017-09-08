<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CargaHorariaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargas Horárias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-horaria-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_carga_horaria',
            'desc_carga_horaria',
            'horas_carga_horaria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Criar Carga Horaria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
