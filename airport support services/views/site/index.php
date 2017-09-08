<?php
use yii\widgets\ListView;
use yii\helpers\url;
/* @var $this yii\web\View */

$this->title = 'Airport Support Serviçes';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem-vindo!</h1>

        <p class="lead">Airport Support Serviçes.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Centros de Custo</h2>

                <p>
                    <?php  foreach ($dataProvider->models as $model) {
                        $url = Url::toRoute(['colaboradores/viewccusto', 'id' => $model->id_ccusto]);
                        echo "<p><a class='btn btn-default' href='$url'>$model->nome_ccusto</a></p>";
                        }
                    ?>
                </p>

            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
