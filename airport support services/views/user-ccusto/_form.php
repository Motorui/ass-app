<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

use app\models\User;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\UserCcusto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-ccusto-form">

<?php

    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'colaboradoresform']);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'id_user'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(User::find()->select(
                ['id', 'displayname']
                )->all(), 'id', 'displayname'),
            ],
            'id_ccusto'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                ['id_ccusto', 'nome_ccusto']
                )->all(), 'id_ccusto', 'nome_ccusto'),
            ],
        ]
    ]);

?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
