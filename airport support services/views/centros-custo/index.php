<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CentrosCustoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Centros de Custo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centros-custo-index">

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_ccusto',
            'num_ccusto',
            'nome_ccusto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::button('Criar Novo', ['value'=>Url::to('index.php?r=centros-custo/create'), 'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>

    <?php

        Modal::begin([
            'header' => 'Criar Centro de Custo',
            'id'     => 'modal',
            'size'   => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();

    ?>
  
</div>
