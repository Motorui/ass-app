<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

            $items = [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Trabalho',
                'items' => [
                    ['label' => 'Colaboradores', 'url' => ['/colaboradores']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Faturas</li>',
                    ['label' => 'Listagem', 'url' => ['/faturas']],
                    ['label' => 'Inserir', 'url' => ['/faturas/create']],
                    ['label' => 'Centros de Custo', 'url' => ['/centros-custo']],
                    ['label' => 'Fornecedores', 'url' => ['/fornecedores']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Outros</li>',
                    ['label' => 'Centros de Custo', 'url' => ['/centros-custo']],
                    ['label' => 'Fornecedores', 'url' => ['/fornecedores']],
                    ['label' => 'Formações', 'url' => ['/formacoes']],
                ],
            ],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'GII', 'url' => ['/gii']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->displayname . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];

    NavBar::begin([
        'brandLabel' => 'Airport Support Serviçes',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


        if ( Yii::$app->user->can('administrador') )
        $items[] = ['label' => 'Administrador',
                    'items' => [
                        ['label' => 'Permissões', 'url' => ['/admin/assignment']],
                        ['label' => 'default', 'url' => ['/admin/default']],
                        ['label' => 'Menus', 'url' => ['/admin/menu']],
                        ['label' => 'Routes', 'url' => ['/admin/route']],
                        ['label' => 'Regras', 'url' => ['/admin/rule']],
                        ['label' => 'Users', 'url' => ['/admin/user']],
                        ['label' => 'Criar Utilizador', 'url' => ['/admin/user/signup']],
                    ],
                ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; portway <?= date('Y') ?></p>

        <p class="pull-right">&copy; <?= Html::mailto('Rui Pereira', 'rui.santos@portway.pt') ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>