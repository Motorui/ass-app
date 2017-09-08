<?php
use yii\widgets\ListView;
use yii\helpers\url;
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'Airport Support Serviçes';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Airport Support Serviçes.</h1>
        <p class="lead">Bem-vindo!</p>
    </div>

    <div class="body-content">

        <div class="row">

            <?php  
                foreach ($dataProvider->models as $model) {
                    $url = Url::toRoute(['centros-custo/view', 'id' => $model->id_ccusto]);

                    echo "<div class='col-lg-4 clearfix'>";

                    echo "<ul class='list-group'>";

                    echo "<li class='list-group-item'>
                            <h3>
                                <strong>$model->nome_ccusto</strong>
                            </h3>
                        </li>";

                    echo "<li class='list-group-item'>
                            <h4>
                                <strong>Faturas</strong>
                            </h4>
                        </li>";

                    echo "<li class='list-group-item'>".Html::a('Inserir Faturas', ['faturas/create', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";

                    echo "<li class='list-group-item'>".Html::a('Listagem Faturas', ['faturas/index', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";

                    echo "<li class='list-group-item'>
                        <h4>
                            <strong>Colaboradores</strong>
                        </h4>
                    </li>";

                    echo "<li class='list-group-item'>".Html::a('Inserir Colaboradores', ['colaboradores/create', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";

                    echo "<li class='list-group-item'>".Html::a('Listagem Colaboradores', ['colaboradores/index', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";

                    echo "<li class='list-group-item'>
                        <h4>
                            <strong>Formações</strong>
                        </h4>
                    </li>";

                    echo "<li class='list-group-item'>".Html::a('Listagem Formações', ['formacoes-colaborador/index', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";

                    echo "<li class='list-group-item'>".Html::a('Atribuir Formações', ['formacoes-colaborador/create', 'id_ccusto' => $model->id_ccusto], ['class' => ''])."</li>";                 

                    echo "</ul>";

                    echo '</div>';
                }                    
            ?>
            
        </div>

    </div>
</div>
