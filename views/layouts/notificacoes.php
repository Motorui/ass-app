<?php
use yii\helpers\ArrayHelper;
use yii\helpers\url;

use app\models\CentrosCusto;
use app\components\GlobalController;

$ccusto = GlobalController::Ccusto();
$colaboradores = GlobalController::ColaboradoresFimContrato();
?>
<li class="dropdown notifications-menu">
    <?php if (!empty($ccusto)) {
        if ($colaboradores) {
            $colaborador = ArrayHelper::map($colaboradores , 'nome_colaborador' ,'id_colaborador' ,'id_ccusto');
            $urlAll = Url::toRoute(['colaboradores/terminus']);
    ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-danger"><?= count($colaboradores); ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Existem <?= count($colaboradores); ?> colaboradores a terminar o contrato</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
            <?php foreach ($colaborador as $idccusto => $data) {
                    $ccustodata = CentrosCusto::findOne(['id_ccusto' => $idccusto]);
                    $url = Url::toRoute(['colaboradores/terminus', 'id' => $ccustodata->id_ccusto, 'id_ccusto' => $ccustodata->id_ccusto]);
                    $nomeccusto = $ccustodata->nome_ccusto.' - <span class="label label-pill label-danger">'.count($data).'</span>'; ?>
                <li>
                    <a href="<?= $url; ?>">
                        <i class="fa fa-users text-aqua"></i> <?= $nomeccusto; ?>
                    </a>
                </li>

            <?php } ?>
            </ul>
        </li>
        <li class="footer"><a href="<?= $urlAll; ?>">Ver Todos</a></li>
    </ul>
            <?php
                //echo '<div class="bs-callout bs-callout-danger">';
                //echo Html::a($nomeccusto, ['colaboradores/terminus', 'id' => $ccustodata->id_ccusto, 'id_ccusto' => $ccustodata->id_ccusto], ['class' => '']);
                //echo '</div>';


        }
    }else{

    }?>

</li>
