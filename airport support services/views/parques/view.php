<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parques */

$this->title = $model->parque;
$this->params['breadcrumbs'][] = ['label' => 'Parques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parques-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_parque',
            'parque',
        ],
    ]) ?>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_parque], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_parque], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar o Parque: "'.$model->parque.'" ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
