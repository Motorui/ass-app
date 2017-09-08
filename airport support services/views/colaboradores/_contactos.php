<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="contactos-index">

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'columns' => [
            'contacto',
        
        ],

    ]); ?>
</div>