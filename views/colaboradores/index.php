<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\models\CentrosCusto;
use app\models\Colaboradores;

use app\views\colaboradores\colaboradoresHelper;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

use kartik\typeahead\Typeahead;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\ColaboradoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$gridColumns = colaboradoresHelper::gridColumns(colaboradoresHelper::input_id_ccusto($id_ccusto));
$nome_ccusto = colaboradoresHelper::nome_ccusto($id_ccusto);
$content = colaboradoresHelper::content($id_ccusto);
$input_id_ccusto = colaboradoresHelper::input_id_ccusto($id_ccusto);

$gridColumns[0] = $input_id_ccusto;

$this->title = Yii::t('app', 'Colaboradores');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="colaboradores-index">

<?=
    GridView::widget([
      'dataProvider'=>$dataProvider,
      'filterModel' => $searchModel,
      'autoXlFormat'=>true,
      'columns'=>$gridColumns,
      'pjax'=>false,
      'pjaxSettings'=> [
          'neverTimeout'=>true,
      ],
      'resizableColumns'=>true,
      'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m"),
      'showPageSummary'=>false,
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
            'filename' => Yii::t('kvgrid', 'Colaboradores - '.$nome_ccusto),
            'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
            'options' => ['title' => Yii::t('kvgrid', 'Colaboradores - '.$nome_ccusto. date("r"))],
            'mime' => 'application/vnd.ms-excel',
            'config' => [
                'worksheet' => Yii::t('kvgrid', 'Colaboradores - '.$nome_ccusto),
                'cssFile' => '',
            ]
        ],
        GridView::PDF => [
            'filename' => Yii::t('kvgrid', 'Colaboradores - '.$nome_ccusto),
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
                    'title' =>  Yii::t('kvgrid', 'Colaboradores - '.$nome_ccusto. date("r")),
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
          'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Colaboradores - '.
          $nome_ccusto
          .'</h3>',
          'type'=>'success',
          'footer'=>false
      ],
    ]);
?>
    <p>
        <?= Html::a(Yii::t('app', 'Criar Colaborador'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
