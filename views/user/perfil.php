<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perfil');
$this->params['breadcrumbs'][] = $this->title;
?>
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= Yii ::getAlias('@web').'/images/user.jpg';?> " alt="User profile picture">

            <h3 class="profile-username text-center"><?= $id = Yii::$app->user->identity->displayname; ?></h3>

            <p class="text-muted text-center"><?= $id = Yii::$app->user->identity->email; ?></p>

          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-body">
              <div class="user-form">

                  <?php $form = ActiveForm::begin(); ?>

                  <?= $form->field($perfil, 'username')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($perfil, 'displayname')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($perfil, 'email')->textInput(['maxlength' => true]) ?>

                  <div class="form-group">
                      <?= Html::submitButton(Yii::t('app', 'Atualizar'), ['class' => 'btn btn-primary']) ?>
                  </div>

                  <?php ActiveForm::end(); ?>

              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-body">
                <div class="site-signup">
                    <p>Por favor preencha os seguintes campos para alterar a sua password:</p>

                    <div class="row">
                        <div class="col-lg-5">
                            <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                                <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                                <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Alterar'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
  </section>
