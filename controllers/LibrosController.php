<?php

namespace app\controllers;

use Yii;
use app\models\Libros;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * LibrosController implements the CRUD actions for Libros model.
 */
class LibrosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Libros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibrosSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Libros model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->libros_id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Libros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Libros;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        		Yii::$app->getSession()->setFlash('success', Yii::t('app', 'El libro ha sido actualizado.'));
            return $this->redirect(['update', 'id' => $model->libros_id]);
        } elseif(!\Yii::$app->request->isPost) {
        		$model->load(Yii::$app->request->get());
            $model->autor_ids = ArrayHelper::map($model->autorAutors, 'nombre', 'nombre');
        }    
            return $this->render('create', ['model' => $model]);
    }
    

    /**
     * Updates an existing Libros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        		Yii::$app->getSession()->setFlash('success', Yii::t('app', 'El libro ha sido actualizado.'));
            return $this->redirect(['update', 'id' => $model->libros_id]);
        } elseif (!\Yii::$app->request->isPost) {
        		$model->load(Yii::$app->request->get());
        		$model->autor_ids = ArrayHelper::map($model->autorAutors, 'nombre', 'nombre');
        	}
            return $this->render('update', ['model' => $model,]);
        
    }

    /**
     * Deletes an existing Libros model.
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
     * Finds the Libros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Libros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Libros::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
