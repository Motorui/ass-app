<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FornecedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fornecedores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="info">
    <?php Pjax::begin(); ?>    <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'list-inline'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model->nome_fornecedor), ['view', 'id' => $model->id_fornecedor]);
            },
        ]) ?>
    <?php Pjax::end(); ?>
</div>
    <p>
        <?= Html::a(Yii::t('app', 'Criar Fornecedores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
