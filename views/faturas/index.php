<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\views\faturas\faturasHelper;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

use kartik\typeahead\Typeahead;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FaturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$gridColumns = faturasHelper::gridColumns(faturasHelper::input_id_ccusto($id_ccusto));
$nome_ccusto = faturasHelper::nome_ccusto($id_ccusto);
$content = faturasHelper::content($id_ccusto);
$input_id_ccusto = faturasHelper::input_id_ccusto($id_ccusto);

$this->title = Yii::t('app', 'Faturas');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="faturas-index">

    <?= GridView::widget([
      'dataProvider'=>$dataProvider,
      'filterModel' => $searchModel,
      'autoXlFormat'=>true,
      'columns'=>$gridColumns,
        'showPageSummary'=>true,
        'responsive'=>true,
        'hover'=>true,
        'showFooter'=>false,
        'footerRowOptions'=>['style'=>'font-weight:bold'],
        'pjax'=>false,
        'pjaxSettings'=> [
            'neverTimeout'=>true,
        ],
        'resizableColumns'=>true,
        'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m"),
        'toolbar' => [
            [
            'content'=> $content,
        ],
        '{export}',
        '{toggleData}'
        ],
        'exportConfig' => [
          GridView::EXCEL => [
              'label' => Yii::t('kvgrid', 'Excel'),
              'icon' => 'floppy-remove',
              'iconOptions' => ['class' => 'text-success'],
              'showHeader' => true,
              'showPageSummary' => true,
              'showFooter' => true,
              'showCaption' => true,
              'filename' => Yii::t('kvgrid', 'Faturas - '.$nome_ccusto),
              'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
              'options' => ['title' => Yii::t('kvgrid', 'Faturas - '.$nome_ccusto. date("r"))],
              'mime' => 'application/vnd.ms-excel',
              'config' => [
                  'worksheet' => Yii::t('kvgrid', 'Faturas - '.$nome_ccusto),
                  'cssFile' => '',
              ]
          ],
          GridView::PDF => [
              'filename' => Yii::t('kvgrid', 'Faturas - '.$nome_ccusto),
              'config' => [
                  'mode' => 'c',
                  'format' => 'A4-L',
                  'destination' => 'D',
                  'marginTop' => 20,
                  'marginBottom' => 20,
                  'cssFile' => '',
                  'cssInline' => '.kv-wrap{padding:20px;}' .
                      '.kv-align-center{text-align:center;}' .
                      '.kv-align-left{text-align:left;}' .
                      '.kv-align-right{text-align:right;}' .
                      '.kv-align-top{vertical-align:top!important;}' .
                      '.kv-align-bottom{vertical-align:bottom!important;}' .
                      '.kv-align-middle{vertical-align:middle!important;}' .
                      '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                      '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                      '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                  'methods' => [
                    'SetHeader'=>['Airport Support Serviçes|portway|Gerado em: ' . date("d-m-Y H:m:s")],
                    'SetFooter'=>['Portway||Página {PAGENO}'],
                  ],
                  'options' => [
                      'title' =>  Yii::t('kvgrid', 'Faturas - '.$nome_ccusto. date("r")),
                      'subject' => Yii::t('kvgrid', 'subject')
                  ],
                  'contentBefore'=> [
                      '<div>'.Html::img('@web/images/logo.jpg', ['alt' => 'Logo', 'width'=>'100']).
                      Html::img('@web/images/hyen.jpg', ['alt' => 'Handling your every need' , 'class'=>'pull-right']).'</div>'
                  ],
                  'contentAfter'=>Yii::t('kvgrid', '')
              ]
          ],
        ],
        'export'=>[
          'label'=>'exportar',
            'fontAwesome'=>false,
            'header'=>'',
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK,
        ],
        'toggleDataOptions' => [
            'all' => [
                'icon' => 'resize-full',
                'label' => Yii::t('kvgrid', 'TUDO'),
                'class' => 'btn btn-default',
                'title' => 'Mostrar todos os resultados'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => Yii::t('kvgrid', 'Página'),
                'class' => 'btn btn-default',
                'title' => 'Mostrar apenas a primeira página'
            ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Faturas - '.
            $nome_ccusto
            .'</h3>',
            'type'=>'success',
            'footer'=>true
        ],
        'rowOptions'=>function($model){
            if($model->valor_fatura < 0 ){
                return ['class' => 'success'];
            }
        },
    ]);
?>

</div>
