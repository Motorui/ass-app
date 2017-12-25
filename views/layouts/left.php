<?php
use yii\helpers\url;
use yii\helpers\html;
use app\components\GlobalController;

$ccusto = GlobalController::Ccusto();
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii ::getAlias('@web').'/images/user.jpg';?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->displayname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
<?php
    if (!empty($ccusto)){
        foreach ($ccusto as $model) {
            $urlInsereFaturas = Url::toRoute(['faturas/create', 'id_ccusto' => $model->id_ccusto]);
            $urlListagemFaturas = Url::toRoute(['faturas/index', 'id_ccusto' => $model->id_ccusto]);
            $urlInsereColaboradores = Url::toRoute(['colaboradores/create', 'id_ccusto' => $model->id_ccusto]);
            $urlListagemColaboradores = Url::toRoute(['colaboradores/index', 'id_ccusto' => $model->id_ccusto]);
            $urlInsereFormacoes = Url::toRoute(['formacoes-colaborador/index', 'id_ccusto' => $model->id_ccusto]);
            $urlListagemFormacoes = Url::toRoute(['formacoes-colaborador/index', 'id_ccusto' => $model->id_ccusto]);

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
    }else{
        $items = array();
    }
?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Centros de Custo',
                        'options' => ['class' => 'active treeview menu-open'],
                        'icon' => 'bars',
                        'url' => '#',
                        'items' => $items,
                    ],
                    ['label' => 'Sobre', 'icon' => 'dashboard', 'url' => ['/site/about']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
                    ['label' => 'GII', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
