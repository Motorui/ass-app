<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?= Url::base();?>" class="site_title"><i class="fa fa-plane"></i> <span>Support Serviçes</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="gentelella-master/production/images/img.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bem Vindo,</span>
        <h2>Rui Pereira</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Serviços</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-wheelchair"></i> MyWay <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= Url::base();?>/index.php?r=colaboradores">Assistentes</a></li>
              <li><a href="#">Repreenções</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bus"></i> Transportes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-phone"></i> Telefonistas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-shopping-cart"></i> Carros de Bagagem <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-info"></i> Apoio ao Passageiro <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-glass"></i> Louge <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-tags"></i> Terminal de Bagagem <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-briefcase"></i> Depósito de Bagagem <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Outras Ferramentas</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-wrench"></i> Tabelas Base <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= Url::base();?>/index.php?r=centros-custo">Centros de Custo</a></li>
              <li><a href="<?= Url::base();?>/index.php?r=parques">Parques</a></li>
              <li><a href="<?= Url::base();?>/index.php?r=contratos">Tipos de Contrato</a></li>
              <li><a href="<?= Url::base();?>/index.php?r=carga-horaria">Carga Horária</a></li>
              <li><a href="<?= Url::base();?>/index.php?r=formacoes">Formações</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-question"></i> para mudar... <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-question"></i> para mudar... <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="http://localhost/ass_app/web/gentelella-master/production/">Template</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
              <li><a href="#">para mudar...</a></li>
            </ul>
          </li>                  
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">

        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="gentelella-master/production/images/img.png" alt="">Rui Pereira
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Perfil</a></li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Opções</span>
              </a>
            </li>
            <li><a href="javascript:;">Ajuda</a></li>
            <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Terminar Sessão</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">4</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="gentelella-master/production/images/img.png" alt="Profile Image" /></span>
                <span>
                  <span>Iolanda Parreira</span>
                  <span class="time">3 mins</span>
                </span>
                <span class="message">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="gentelella-master/production/images/img.png" alt="Profile Image" /></span>
                <span>
                  <span>João Gerardo</span>
                  <span class="time">25 mins</span>
                </span>
                <span class="message">
                  sed do eiusmod tempor incididunt ut labore et dolore magna ...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="gentelella-master/production/images/img.png" alt="Profile Image" /></span>
                <span>
                  <span>Iolanda Parreira</span>
                  <span class="time">30 mins</span>
                </span>
                <span class="message">
                  Ut enim ad minim veniam, quis nostrud exercitation ...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="gentelella-master/production/images/img.png" alt="Profile Image" /></span>
                <span>
                  <span>Iolanda Parreira</span>
                  <span class="time">36 mins</span>
                </span>
                <span class="message">
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur ...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>Ver todas as mensagens</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->