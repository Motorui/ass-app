<?php

namespace app\controllers;

use Yii;
use app\models\MultiplosContactos;
use app\models\Colaboradores;
use app\models\ColaboradoresSearch;
use app\models\Contactos;
use app\models\VinculoLaboral;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ColaboradoresController implements the CRUD actions for Colaboradores model.
 */
class ColaboradoresController extends Controller
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
     * Lists all Colaboradores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColaboradoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colaboradores model.
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
     * Creates a new Colaboradores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Colaboradores();
        $modelsContactos = [new Contactos];
        $modelVinculoLaboral = new VinculoLaboral();

        if ( $model->load( Yii::$app->request->post()) 
            && $modelVinculoLaboral->load(Yii::$app->request->post()) ) 
        {
            $modelsContactos = MultiplosContactos::createMultiple(Contactos::classname());
            MultiplosContactos::loadMultiple($modelsContactos, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $Valid = $modelVinculoLaboral->validate() && $valid;
            $valid = MultiplosContactos::validateMultiple($modelsContactos) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    if ($flag = $model->save(false)) {

                        $modelVinculoLaboral->id_colaborador = $model->id_colaborador;
                        $modelVinculoLaboral->save(false);

                        foreach ($modelsContactos as $modelContactos) {
                            $modelContactos->id_colaborador = $model->id_colaborador;
                            if (! ($flag = $modelContactos->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_colaborador]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsContactos' => (empty($modelsContactos)) ? [new Contactos] : $modelsContactos,
                'modelVinculoLaboral' => $modelVinculoLaboral,
            ]);
        }
    }

    /**
     * Updates an existing Colaboradores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsContactos = $model->contactos;
        $modelVinculoLaboral = $model->vinculoLaboral;

        if ( $model->load(Yii::$app->request->post()) 
            && $modelVinculoLaboral->load(Yii::$app->request->post()) 
            && $model->save() && $modelVinculoLaboral->save() ) 
        {

            $oldIDs = ArrayHelper::map($modelsContactos, 'id_contacto', 'id_contacto');
            $modelsContactos = MultiplosContactos::createMultiple(Contactos::classname(), $modelsContactos);
            MultiplosContactos::loadMultiple($modelsContactos, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsContactos, 'id_contacto', 'id_contacto')));

            // validate all models
            $valid = $model->validate();
            $valid = MultiplosContactos::validateMultiple($modelsContactos) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Contactos::deleteAll(['id_contacto' => $deletedIDs]);
                        }
                        foreach ($modelsContactos as $modelsContacto) {
                            $modelsContacto->id_colaborador = $model->id_colaborador;
                            if (! ($flag = $modelsContacto->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_colaborador]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsContactos' => (empty($modelsContactos)) ? [new Contactos] : $modelsContactos,
                'modelVinculoLaboral' => $modelVinculoLaboral,
            ]);
        }
    }

    /**
     * Deletes an existing Colaboradores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function beforeDelete(){
        foreach($this->location_children as $c)
            $c->delete();
        return parent::beforeDelete();
    }
    /**
     * Finds the Colaboradores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Colaboradores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Colaboradores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findContactos($id)
    {
        if (($model = Contactos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findVinculoLaboral($id)
    {
        if (($model = VinculoLaboral::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
