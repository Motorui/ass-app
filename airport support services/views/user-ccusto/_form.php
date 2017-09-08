<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;

use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
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

    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_INLINE, 'id'=>'user-ccusto-form']);
 
    $centrosCusto = CentrosCusto::find()->all();

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>1,
        'attributes'=>[       
            'id_user'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(User::find()->select(
                        ['id', 'displayname']
                        )->all(), 'id', 'displayname'),
                'columnOptions'=>['width'=>'100px']
            ],
            //'id_ccusto'=>, 
        ]
    ]);

    foreach ($centrosCusto as $row) {

    echo '<p>';
    
    echo CheckboxX::widget([
        'name'=>$row['nome_ccusto'],
        'options'=>['id_ccusto'=>$row['id_ccusto']],
        'pluginOptions'=>['threeState'=>false]
    ]);
    echo '<label class="cbx-label" for="s_1"> '.$row['nome_ccusto'].'</label>';

    echo '</p>';
    }
?>
    <div class="form-group">
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
