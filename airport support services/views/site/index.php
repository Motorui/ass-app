<?php
use yii\widgets\ListView;
use yii\helpers\url;
use yii\helpers\html;
use yii\bootstrap\Collapse;
/* @var $this yii\web\View */

$this->title = 'Airport Support Serviçes';
?>
<div class="site-index">

<!--     <div class="jumbotron">
        <h1>Airport Support Serviçes.</h1>
        <p class="lead">Bem-vindo!</p>
    </div> -->

    <div class="body-content">
        
        <div class="row">
        <?php
            foreach ($dataProvider->models as $model) {

                $url = Url::toRoute(['centros-custo/view', 'id' => $model->id_ccusto]);

                $urlInsereFaturas = Html::a('Inserir Faturas', ['faturas/create', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $urlListagemFaturas = Html::a('Listagem Faturas', ['faturas/index', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $urlInsereColaboradores = Html::a('Inserir Colaboradores', ['colaboradores/create', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $urlListagemColaboradores = Html::a('Listagem Colaboradores', ['colaboradores/index', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $urlInsereFormacoes = Html::a('Listagem Formações', ['formacoes-colaborador/index', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                $urlListagemFormacoes = Html::a('Atribuir Formações', ['formacoes-colaborador/create', 'id_ccusto' => $model->id_ccusto], ['class' => '']);

                echo "<div class='col-lg-4 list-group'>";
                echo "<a href='#' class='list-group-item active'>";
                echo "<h3 class='list-group-item-heading'>$model->nome_ccusto</h3>";
                echo "</a>";

                echo Collapse::widget([
                    'items' => [
                        // equivalent to the above
                        [
                            'label' => 'Faturas:',
                            'content' => [
                                $urlInsereFaturas,
                                $urlListagemFaturas
                            ],
                            'contentOptions' => ['class' => ''],
                            'options' => ['class' => ''],
                        ],
                        // another group item
                        [
                            'label' => 'Colaboradores:',
                            'content' => [
                                $urlInsereColaboradores,
                                $urlListagemColaboradores
                            ],
                            'contentOptions' => ['class' => ''],
                            'options' => [''],
                        ],
                        [
                            'label' => 'Formações:',
                            'content' => [
                                $urlInsereFormacoes,
                                $urlListagemFormacoes
                            ],
                            'contentOptions' => ['class' => ''],
                            'options' => [''],
                        ],
                    ],

                ]);

                echo "</ul>";

                echo '</div>';                
            }
        ?>
        </div>
    </div>
</div>
