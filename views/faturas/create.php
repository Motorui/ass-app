<?php

use yii\helpers\Html;
use kartik\widgets\Growl;


/* @var $this yii\web\View */
/* @var $model app\models\Faturas */

$this->title = Yii::t('app', 'Adicionar Faturas');

    if ($id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto')){
        $url = ['index', 'id_ccusto' => $id_ccusto];
    }else{
        $url = ['index'];
    }

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faturas'), 'url' => $url];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faturas-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?php

    if (Yii::$app->session->hasFlash('success')):
        echo Growl::widget([

            'type' => Growl::TYPE_SUCCESS,
            'title' => 'Submetido!',
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => 'Os dados da fatura foram gravados com sucesso.',
            'showSeparator' => true,
            'delay' => 0,
            'pluginOptions' => [
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'top',
                    'align' => 'center',
                    ]
                ]
        ]);

    endif;
?>
</div>
