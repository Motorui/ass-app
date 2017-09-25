<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

use app\models\User;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\UserCcusto */
/* @var $form yii\widgets\ActiveForm */

    $centroscusto = CentrosCusto::find()->all();
    $form = ActiveForm::begin(['id' => 'user-ccusto-form', 'type' => ActiveForm::TYPE_VERTICAL]);
?>

<div class="user-ccusto-form">
    <div class="form-group col-sm-6">

        <?= $form->field($model, 'id_user', ['showLabels'=>false])->widget(Select2::classname(), [
                'data'=>ArrayHelper::map(User::find()->select(
                    ['id', 'displayname']
                    )->all(), 'id', 'displayname'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'Selecionar Utilizador...']
            ]); ?>

        <?= $form->field($model, 'id_ccusto')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($centroscusto, 'id_ccusto', 'nome_ccusto'),
            'options' => [
                'placeholder' => 'Selecionar Centros de Custo ...',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    </div>

    <div class="form-group col-sm-12">        
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php

ActiveForm::end();

?>


<?php
echo '<pre>';

if (isset($_POST)) {
print_r($_POST);
}
echo '</pre>';
?>

</div>
