<?php

namespace app\controllers;

use Yii;
use app\models\Resumo;
use app\models\searches\ResumoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * ResumoController implements the CRUD actions for Resumo model.
 */
class ResumoController extends Controller
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

    public function actionTest()
    {
        $mes = date("Y-m-d", strtotime("first day of previous month"));

        $sql = "SELECT `resumo_mes`, `total_total`,`total_chegadas`,`total_partidas`,`total_36h`,`chegadas_36h`,`partidas_36h`,`total_90m_36h`,`chegadas_90m_36h`,`partidas_90m_36h`,`total_90m`,`chegadas_90m`,`partidas_90m` FROM `resumo`";

        $rawData = Yii::$app->db->createCommand ($sql)->queryAll();
        $searchModel = new ResumoSearch();

        $dataProvider = new ArrayDataProvider([
            //'totaItemCount' => count($rawData),
            'allModels' => $rawData,
            'sort' => [
                'attributes' => [array_keys($rawData[0])],
            ],

        ]);

        return $this->render('test', [
            'sql' => $sql,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Lists all Resumo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResumoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Resumo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Resumo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resumo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resumo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Resumo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resumo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Resumo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Resumo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resumo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resumo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
