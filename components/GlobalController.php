<?php
namespace app\components;

use Yii;
use app\models\searches\CentrosCustoSearch;
use app\models\CentrosCusto;
use app\models\UserCcusto;
use app\models\Colaboradores;
use app\models\Faturas;

class GlobalController extends \yii\web\Controller
{

    public function init(){
        parent::init();
    }

    public static function UserId(){   //Id do user que está logado
        return Yii::$app->user->getId();
    }

    public static function UserCcusto(){   //Ids dos Centros de custo a que o user tem acesso

        $userid = GlobalController::UserId();
        $uccusto = UserCcusto::find()->where(['id_user' => $userid])->all();

        return $uccusto;
    }

    public static function IdCcusto(){ //Converte os Ids dos Centros de custo em lista

        $uccusto = GlobalController::UserCcusto();

        foreach ($uccusto as $row) {
            $idcc[] = $row['id_ccusto'];
        }

        if (empty($idcc)) {
            $idcc = array();
            return $idcc;
        }else{
            return $idcc;
        }
    }

    public static function Ccusto(){

        $idcc = GlobalController::IdCcusto();
        $idccusto = implode (", ", $idcc);
        $ccusto = CentrosCusto::findAll($idcc);

        Yii::$app->params['ccusto'] = $ccusto;
        return $ccusto;
    }

    public static function ColaboradoresFimContrato(){

        $idcc = GlobalController::IdCcusto();
        $dataFimContracto = date('Y-m-d', strtotime('+3 month'));

        $colaboradores = Colaboradores::find()->where([
            'id_ccusto' => $idcc,
            'status_colaborador'=>'activo'])->andWhere([
            '<=', 'fim_contrato', $dataFimContracto
        ])->all();

        if (empty($colaboradores)) {
            $colaboradores = array();
            return $colaboradores;
        }else{
            return $colaboradores;
        }

    }

    public static function ColaboradoresAll($idcc){

        $colaboradores = Yii::$app->db->createCommand(
          "SELECT COUNT(*) AS 'num' FROM `colaboradores` WHERE `status_colaborador` = 'activo' AND `id_ccusto` = '$idcc'"
          )->queryAll();

        if (!empty($colaboradores)) {
            return $colaboradores;
        }

    }

    public static function TopFaturasMes($idcc){

        $month_ini = date("Y-m-d", mktime(0, 0, 0, date("m")-1, 1));
        $month_end = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));

        $query = Yii::$app->db->createCommand(
            "SELECT `b`.`nome_fornecedor`, SUM(`a`.`valor_fatura`) AS `Total`
            FROM `faturas` `a`, `fornecedores` `b`
            WHERE (`a`.`data_fatura` BETWEEN '$month_ini' AND '$month_end')
            AND `id_ccusto` = $idcc
            AND `tipo_fatura` = 'Fatura'
            AND `a`.`id_fornecedor` = `b`.`id_fornecedor`
            GROUP BY `nome_fornecedor`
            ORDER BY `Total`
            DESC LIMIT 5" )
            ->queryAll();

            foreach($query as $key => $values) {
                $series[$key]['type'] = 'column';
                $series[$key]['name'] = $values['nome_fornecedor'];
                unset($values['nome_fornecedor']);
                $series[$key]['data'] = array_map('floatval', array_values($values));
            }

            if (!empty($series)){
                return $series;
            }
    }

    public static function TopFaturasAno($idcc){

        $month_ini = date("Y-m-d", strtotime(date('first day of this year')));
        $month_end = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));

        $query = Yii::$app->db->createCommand(
            "SELECT `b`.`nome_fornecedor`, SUM(`a`.`valor_fatura`) AS `Total`
            FROM `faturas` `a`, `fornecedores` `b`
            WHERE (`a`.`data_fatura` BETWEEN '$month_ini' AND '$month_end')
            AND `id_ccusto` = $idcc
            AND `tipo_fatura` = 'Fatura'
            AND `a`.`id_fornecedor` = `b`.`id_fornecedor`
            GROUP BY `nome_fornecedor`
            ORDER BY `Total`
            DESC LIMIT 5" )
            ->queryAll();

            foreach($query as $key => $values) {
                $series[$key]['type'] = 'column';
                $series[$key]['name'] = $values['nome_fornecedor'];
                unset($values['nome_fornecedor']);
                $series[$key]['data'] = array_map('floatval', array_values($values));
            }

            if (!empty($series)){
                return $series;
            }
    }

    public static function TotalFaturasAno($idcc){

        $month_ini = date("Y-m-d", strtotime(date('first day of this year')));
        $month_end = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));

        $query = Yii::$app->db->createCommand(
            "SELECT SUM(`valor_fatura`) AS `Total`
            FROM `faturas`
            WHERE (`data_fatura` BETWEEN '$month_ini' AND '$month_end')
            AND `id_ccusto` = '$idcc'
            AND `tipo_fatura` = 'Fatura'" )
            ->queryAll();

            if (!empty($query)){
                return $query;
            }
    }

    public static function TotalNotasCreditoAno($idcc){

        $month_ini = date("Y-m-d", strtotime(date('first day of this year')));
        $month_end = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));

        $query = Yii::$app->db->createCommand(
            "SELECT SUM(`valor_fatura`) AS `Total`
            FROM `faturas`
            WHERE (`data_fatura` BETWEEN '$month_ini' AND '$month_end')
            AND `id_ccusto` = '$idcc'
            AND `tipo_fatura` = 'Nota de crédito'" )
            ->queryAll();

            if (!empty($query)){
                return $query;
            }
    }

    public static function MesPt($mes){
        $meses = array(
            1=>"Janeiro",
            2=>"Fevereiro",
            3=>"Março",
            4=>"Abril",
            5=>"Maio",
            6=>"Junho",
            7=>"Julho",
            8=>"Agosto",
            9=>"Setembro",
            10=>"Outubro",
            11=>"Novembro",
            12=>"Dezembro"
            );
            return $meses[$mes];
    }

}
