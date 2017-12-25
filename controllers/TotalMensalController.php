<?php

namespace app\controllers;

use Yii;
use app\models\TotalMensal;
use app\models\searches\TotalMensalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * TotalMensalController implements the CRUD actions for TotalMensal model.
 */
class TotalMensalController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TotalMensal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sql = "SELECT *, (
          `janeiro` + `fevereiro` + `marco` + `abril` + `maio` + `junho` +
          `julho` + `agosto` + `setembro` + `outubro` + `novembro` + `dezembro`
        ) AS 'Total' FROM `total_mensal` ORDER BY `ano` DESC";

        $rawData = Yii::$app->db2->createCommand ($sql)->queryAll();

        $searchModel = new TotalMensalSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider = new ArrayDataProvider([
            //'totaItemCount' => count($rawData),
            'allModels' => $rawData,
            'key' => 'id_total_mensal',

        ]);

        return $this->render('//estatisticas/total-mensal/index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TotalMensal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('//estatisticas/total-mensal/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TotalMensal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TotalMensal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_total_mensal]);
        } else {
            return $this->render('//estatisticas/total-mensal/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TotalMensal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_total_mensal]);
        } else {
            return $this->render('//estatisticas/total-mensal/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TotalMensal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['//estatisticas/total-mensal/index']);
    }

    /**
     * Finds the TotalMensal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TotalMensal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TotalMensal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
