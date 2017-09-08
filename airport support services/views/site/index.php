<?php
use yii\widgets\ListView;
use yii\helpers\url;
use yii\helpers\html;
use yii\bootstrap\Collapse;
use kartik\sidenav\SideNav;

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
                        echo '<div class="bs-callout bs-callout-danger">';
                            echo '<h4>Os seguintes colaboradores estão prestes a terminar o contrato</h4>';
                            foreach ($colaboradores as $colaborador) {
                                echo '<p>';
                                echo Html::a($colaborador->nome_colaborador, ['colaboradores/view', 'id' => $colaborador->id_colaborador, 'id_ccusto' => $colaborador->id_ccusto], ['class' => 'profile-link']);
                                echo '</p>';
                            }
                        echo '</div>';
                        
                    } else {
                        echo '<div class="bs-callout bs-callout-success">';
                            echo '<h4>Não existem colaboradores a terminar o contrato</h4>';
                        echo '</div>';
                    }
                ?>
            <pre>
        <?php
            echo $dataFimContracto;
            echo '<p></p>';
            print_r($colaboradores);
}else{
        ?>
        </pre>
        </div>
            <div class="jumbotron">
                <h1>Contacte o administrador</h1> 
                <p>Ainda não tem acesso a centros de custo, por favor contacte o administrador.</p> 
          </div>
<?php } ?>
</div>
