<?php
use yii\helpers\url;
use yii\helpers\html;
use yii\helpers\arrayHelper;
use yii\web\JsExpression;
use app\components\GlobalController;
use miloschuman\highcharts\Highcharts;

$ccusto = GlobalController::Ccusto();

$data = new DateTime();
//date_modify($data_time,"last month"); //date_modify modifies the timestamp. ex: last month, + 15 days etc..
$data->modify("last month"); // you can also use modify funtion for timestamp.  ex: last month, + 15 days etc..
$last_month = $data->format("n"); // return last month in number ex: 4
$this_year = $data->format("Y");

$mes = GlobalController::MesPt($last_month);
/* @var $this yii\web\View */

$this->title = 'Airport Support Serviçes';
?>
<div class="site-index">
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <?php if (!empty($ccusto)){
          foreach ($ccusto as $model) {
            $TotalFaturasAno = GlobalController::TotalFaturasAno($model->id_ccusto);
            $TotalNotasCreditoAno = GlobalController::TotalNotasCreditoAno($model->id_ccusto);
            $ColaboradoresAll = GlobalController::ColaboradoresAll($model->id_ccusto);
        ?>
        <div class="row">
            <p><?= $model->nome_ccusto; ?></p>
            <!-- Small boxes (Stat box) -->
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= number_format($TotalFaturasAno[0]['Total'], 2); ?></h3>

                  <p>Total Faturas este ano</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="
                    <?= Url::toRoute(['/faturas', 'id_ccusto' => $model->id_ccusto, 'FaturasSearch[tipo_fatura]'=>'fatura']); ?>
                  " class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= number_format($TotalNotasCreditoAno[0]['Total'], 2); ?></h3>

                  <p>Total notas de crédito este ano</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="
                    <?= Url::toRoute(['/faturas', 'id_ccusto' => $model->id_ccusto, 'FaturasSearch[tipo_fatura]'=>'Nota de crédito']); ?>
                  " class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $ColaboradoresAll[0]['num']; ?></h3>

                  <p>Total FTE's</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="
                  <?= Url::toRoute(['/colaboradores', 'id_ccusto' => $model->id_ccusto, 'ColaboradoresSearch[status_colaborador]'=>'activo']); ?>
                " class="small-box-footer">Listagem <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= number_format(($TotalNotasCreditoAno[0]['Total'] + $TotalFaturasAno[0]['Total']), 2); ?></h3>

                  <p>Total (Faturas - Notas de crédito) </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <?php
              if (GlobalController::TopFaturasMes($model->id_ccusto)){
                  $series = GlobalController::TopFaturasMes($model->id_ccusto);
              ?>
            <div class="col-lg-6">
              <?= Highcharts::widget([
              'scripts' => [
                  'modules/exporting',
                  //'themes/gray',
              ],
              'options' => [
                'credits' => ['enabled' => false],
                'type'=> 'bar',
              'plotOptions'=> [
                  'column'=> [
                      'colorByPoint'=> false,
                      'pointPadding'=> 0.2,
                      'borderWidth'=> 0
                  ]
              ],
                    'tooltip'=> [
                      'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                      'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}:
                        </td><td style="padding:0"><b>{point.y}</b></td></tr>',
                      'footerFormat'=> '</table>',
                      'shared'=> true,
                      'useHTML'=> true
                  ],
                  'title' => [
                      'text' => 'Top 5 despesas, mês de '.$mes,
                  ],
                  'subtitle'=> [
                        'text'=> 'Dados '.$model->nome_ccusto.' - LIS'
                  ],
                  'yAxis'=>  [
                    'min'=> 0,
                    'title'=> [
                        'text'=> 'Top 5 despesas'
                    ],
                    'labels'=> [
                    'format'=> '{value}',
                    'formatter' => new JsExpression('function(){  return this.value + " €"; }'),
                    ]
                  ],
                  'xAxis' => [
                      'categories' => [
                        'Total',
                      ],
                      'crosshair'=> true,
                  ],
                  'labels' => [

                  ],
                  'series' => $series,
              ]
              ]);
          ?>
            </div>
        <?php } ?>
        <?php
          if (GlobalController::TopFaturasAno($model->id_ccusto)){
              $series = GlobalController::TopFaturasAno($model->id_ccusto);
          ?>
        <div class="col-lg-6">
          <?= Highcharts::widget([
          'scripts' => [
              'modules/exporting',
              //'themes/gray',
          ],
          'options' => [
            'credits' => ['enabled' => false],
            'type'=> 'bar',
          'plotOptions'=> [
              'column'=> [
                  'colorByPoint'=> false,
                  'pointPadding'=> 0.2,
                  'borderWidth'=> 0
              ]
          ],
                'tooltip'=> [
                  'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                  'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}:
                    </td><td style="padding:0"><b>{point.y}</b></td></tr>',
                  'footerFormat'=> '</table>',
                  'shared'=> true,
                  'useHTML'=> true
              ],
              'title' => [
                  'text' => 'Top 5 despesas, ano de '.$this_year,
              ],
              'subtitle'=> [
                    'text'=> 'Dados '.$model->nome_ccusto.' - LIS'
              ],
              'yAxis'=>  [
                'min'=> 0,
                'title'=> [
                    'text'=> 'Top 5 despesas'
                ],
                'labels'=> [
                'format'=> '{value}',
                'formatter' => new JsExpression('function(){  return this.value + " €"; }'),
                ]
              ],
              'xAxis' => [
                  'categories' => [
                    'Total',
                  ],
                  'crosshair'=> true,
              ],
              'labels' => [

              ],
              'series' => $series,
          ]
          ]);
      ?>
        </div>
    <?php } ?>
          </div>
            <!-- /.row -->
        <?php }} ?>


      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
