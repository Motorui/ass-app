<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParquesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parques-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_parque',
            'parque',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Criar Parque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
