<?php
use yii\widgets\ListView;
use yii\helpers\url;
use yii\helpers\html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;
use kartik\sidenav\SideNav;

use app\models\CentrosCusto;

/* @var $this yii\web\View */

$this->title = 'Airport Support Serviçes';
?>
<div class="site-index">

    <div class="body-content">
            <div class="col-md-3">
        <?php
if (!empty($ccusto)) {

            foreach ($ccusto as $model) {

                $urlInsereFaturas = Url::toRoute(['faturas/create', 'id_ccusto' => $model->id_ccusto]);

                $urlListagemFaturas = Url::toRoute(['faturas/index', 'id_ccusto' => $model->id_ccusto]);

                $urlInsereColaboradores = Url::toRoute(['colaboradores/create', 'id_ccusto' => $model->id_ccusto]);

                $urlListagemColaboradores = Url::toRoute(['colaboradores/index', 'id_ccusto' => $model->id_ccusto]);

                $urlInsereFormacoes = Url::toRoute(['formacoes-colaborador/index', 'id_ccusto' => $model->id_ccusto]);

                $urlListagemFormacoes = Url::toRoute(['faturas/index', 'id_ccusto' => $model->id_ccusto]);
                Html::a('Atribuir Formações', ['formacoes-colaborador/create', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $items[] = [
                    'label' => $model->nome_ccusto, 'icon' => 'folder-open', 'items' => [
                            ['label' => 'Faturas', 'icon'=>'euro', 'items' => [
                                ['label' => 'Inserir', 'icon'=>'edit', 'url'=>$urlInsereFaturas],
                                ['label' => 'Listagem', 'icon'=>'list-alt', 'url'=>$urlListagemFaturas],
                                ],
                            ],
                            ['label' => 'Colaboradores', 'icon'=>'user', 'items' => [
                                ['label' => 'Inserir', 'icon'=>'edit', 'url'=>$urlInsereColaboradores],
                                ['label' => 'Listagem', 'icon'=>'list-alt', 'url'=>$urlListagemColaboradores],
                                ],
                            ],
                            ['label' => 'Formações', 'icon'=>'book', 'items' => [
                                ['label' => 'Inserir', 'icon'=>'edit', 'url'=>$urlInsereFormacoes],
                                ['label' => 'Listagem', 'icon'=>'list-alt', 'url'=>$urlListagemFormacoes],
                                ],
                            ]
                        ]
                ];
            }

            echo SideNav::widget([
                'type' => SideNav::TYPE_PRIMARY,
                'heading' => 'Centros de Custo',
                'items' => $items,

            ]);


        ?>
            </div>
            <div class="col-md-9">
                <?php
                    if ($colaboradores) {
                      $colaborador = ArrayHelper::map($colaboradores , 'nome_colaborador' ,'id_colaborador' ,'id_ccusto');

                      echo '<div class="bs-callout bs-callout-danger">';
                        echo '<h4>Existem colaboradores a terminar o contrato</h4>';
                      echo '</div>';
                      foreach ($colaborador as $idccusto => $data) {
                        $ccustodata = CentrosCusto::findOne(['id_ccusto' => $idccusto]);
                        $nomeccusto = $ccustodata->nome_ccusto.' - <span class="label label-pill label-danger">'.count($data).'</span>';
                        echo '<div class="bs-callout bs-callout-danger">';
                        echo Html::a($nomeccusto, ['colaboradores/terminus', 'id' => $ccustodata->id_ccusto, 'id_ccusto' => $ccustodata->id_ccusto], ['class' => '']);
                        echo '</div>';
                      }

                    } else {
                        echo '<div class="bs-callout bs-callout-success">';
                            echo '<h4>Não existem colaboradores a terminar o contrato</h4>';
                        echo '</div>';
                    }
}else{
        ?>

        </div>
            <div class="jumbotron">
                <h1>Contacte o administrador</h1>
                <p>Ainda não tem acesso a centros de custo, por favor contacte o administrador.</p>
          </div>
<?php } ?>
</div>
