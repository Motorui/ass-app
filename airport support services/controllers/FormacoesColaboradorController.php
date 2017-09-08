<?php

namespace app\controllers;

use Yii;
use app\models\FormacoesColaborador;
use app\models\FormacoesColaboradorSearch;
use app\models\Formacoes;
use app\models\Colaboradores;
use app\models\ColaboradoresSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

/**
 * FormacoesColaboradorController implements the CRUD actions for FormacoesColaborador model.
 */
class FormacoesColaboradorController extends Controller
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
     * Lists all FormacoesColaborador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchFc = new FormacoesColaboradorSearch();

        $searchC = new ColaboradoresSearch();

        $id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto');
        
        if (!$id_ccusto) {
            $dataC = $searchC->search(Yii::$app->request->queryParams);
        }else{
            $searchC->id_ccusto = $id_ccusto;
            $dataC = $searchC->search(Yii::$app->request->queryParams);
        };

        $dataFc = $searchFc->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchFc' => $searchFc,
            'dataFc' => $dataFc,
            'searchC' => $searchC,
            'dataC' => $dataC,
            'id_ccusto' => $id_ccusto,
        ]);
    }

    /**
     * Displays a single FormacoesColaborador model.
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
     * Creates a new FormacoesColaborador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormacoesColaborador();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_fc]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }

        if ($model->load(Yii::$app->request->post())) {

            $data_formacao = Yii::$app->request->post("FormacoesColaborador")["data_formacao"];
            $id_formacao = Yii::$app->request->post("FormacoesColaborador")["id_formacao"];

            $validade_formacao = Formacoes::find()->select(['validade_formacao'])
                    ->where(['id_formacao'=>$id_formacao])->one();

            $validade = $validade_formacao->validade_formacao;

            $caducidade = date('Y-m-d', strtotime('+'.$validade. 'years', strtotime($data_formacao)));

            $model->caducidade = $caducidade;

            $model->save();

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Updates an existing FormacoesColaborador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $data_formacao = Yii::$app->request->post("FormacoesColaborador")["data_formacao"];
            $id_formacao = Yii::$app->request->post("FormacoesColaborador")["id_formacao"];

            $validade_formacao = Formacoes::find()->select(['validade_formacao'])
                    ->where(['id_formacao'=>$id_formacao])->one();

            $validade = $validade_formacao->validade_formacao;

            $caducidade = date('Y-m-d', strtotime('+'.$validade. 'years', strtotime($data_formacao)));

            $model->caducidade = $caducidade;

            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id_fc]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FormacoesColaborador model.
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
     * Finds the FormacoesColaborador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormacoesColaborador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormacoesColaborador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
