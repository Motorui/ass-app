<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <strong class="">&copy; <?= Html::mailto('Rui Pereira', 'rui.santos@portway.pt') ?> <?= date('Y') ?></strong>
        &nbsp;-&nbsp;<b>Versão</b> 2.0
    </div>
    <div class="container">
        <strong>portway <?= date('Y') ?></strong>

    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-tabelas-tab" data-toggle="tab"><i class="fa fa-gears"></i>&nbsp; Tabelas</a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i>&nbsp; Administrador</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <ul>
              <li><a href="<?= Url::to(['/admin/assignment']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Permissões</a></li>
              <li><a href="<?= Url::to(['/admin/default']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; default</a></li>
              <li><a href="<?= Url::to(['/admin/menu']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Menus</a></li>
              <li><a href="<?= Url::to(['/admin/route']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Routes</a></li>
              <li><a href="<?= Url::to(['/admin/rule']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Regras</a></li>
              <li><a href="<?= Url::to(['/admin/user']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Users</a></li>
              <li><a href="<?= Url::to(['/admin/user/signup']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Criar Utilizador</a></li>
              <li><a href="<?= Url::to(['/user-ccusto']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Centros de custo</a></li>
          </ul>
        </div>
        <!-- /.tab-pane -->
        <!-- tabelas tab content -->
        <div class="tab-pane" id="control-sidebar-tabelas-tab">
            <ul>
                <li class="dropdown-header">Colaboradores</li>
              <li><a href="<?= Url::to(['/colaboradores']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Listagem</a></li>
              <li><a href="<?= Url::to(['/colaboradores/create']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Inserir</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Faturas</li>
              <li><a href="<?= Url::to(['/faturas']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Listagem</a></li>
              <li><a href="<?= Url::to(['/faturas/create']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Inserir</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Outros</li>
              <li><a href="<?= Url::to(['/centros-custo']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Centros de Custo</a></li>
              <li><a href="<?= Url::to(['/fornecedores']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Fornecedores</a></li>
              <li><a href="<?= Url::to(['/formacoes']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Formações</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Estatísticas MyWay</li>
              <li><a href="<?= Url::to(['/total-mensal']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Estatísticas</a></li>
              <li><a href="<?= Url::to(['/atrasos']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Atrasos</a></li>
              <li><a href="<?= Url::to(['/atrasos/grafico']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Grafico Atrasos</a></li>
              <li><a href="<?= Url::to(['/resumo/test']); ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Testes</a></li>
          </ul>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
