<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColaboradoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colaboradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colaboradores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Colaboradores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_colaborador',
            'nome_colaborador',
            'email_colaborador:email',
            'identificao_colaborador',
            'identificao_validade',
            // 'status_colaborador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
