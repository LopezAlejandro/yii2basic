<?php

namespace app\controllers;

use Yii;
use app\models\Lectores;
use app\models\LectoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LectoresController implements the CRUD actions for Lectores model.
 */
class LectoresController extends Controller
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
     * Lists all Lectores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LectoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lectores model.
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
     * Creates a new Lectores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lectores();

        if ($model->load(Yii::$app->request->post())) {
        			$model->create_time = new Expression('NOW()');
        			$model->update_time = new Expression('NOW()');
        				if ($model->save()) {
            			return $this->redirect(['view', 'id' => $model->lectores_id]);
        				} 
        		}
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    

    /**
     * Updates an existing Lectores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
				$model->update_time = new Expression('NOW()');
        			   if($model->save()) {
            		return $this->redirect(['index', 'id' => $model->lectores_id]);
        				}
        }
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    /**
     * Deletes an existing Lectores model.
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
     * Finds the Lectores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lectores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lectores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
