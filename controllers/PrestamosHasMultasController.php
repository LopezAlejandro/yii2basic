<?php

namespace app\controllers;

use Yii;
use app\models\PrestamosHasMultas;
use app\models\PrestamosHasMultasController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrestamosHasMultasController implements the CRUD actions for PrestamosHasMultas model.
 */
class PrestamosHasMultasController extends Controller
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
     * Lists all PrestamosHasMultas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrestamosHasMultasController();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PrestamosHasMultas model.
     * @param integer $prestamos_prestamos_id
     * @param integer $prestamos_multas_id
     * @return mixed
     */
    public function actionView($prestamos_prestamos_id, $prestamos_multas_id)
    {
        $model = $this->findModel($prestamos_prestamos_id, $prestamos_multas_id);
        return $this->render('view', [
            'model' => $this->findModel($prestamos_prestamos_id, $prestamos_multas_id),
        ]);
    }

    /**
     * Creates a new PrestamosHasMultas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PrestamosHasMultas();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PrestamosHasMultas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $prestamos_prestamos_id
     * @param integer $prestamos_multas_id
     * @return mixed
     */
    public function actionUpdate($prestamos_prestamos_id, $prestamos_multas_id)
    {
        $model = $this->findModel($prestamos_prestamos_id, $prestamos_multas_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PrestamosHasMultas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $prestamos_prestamos_id
     * @param integer $prestamos_multas_id
     * @return mixed
     */
    public function actionDelete($prestamos_prestamos_id, $prestamos_multas_id)
    {
        $this->findModel($prestamos_prestamos_id, $prestamos_multas_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export PrestamosHasMultas information into PDF format.
     * @param integer $prestamos_prestamos_id
     * @param integer $prestamos_multas_id
     * @return mixed
     */
    public function actionPdf($prestamos_prestamos_id, $prestamos_multas_id) {
        $model = $this->findModel($prestamos_prestamos_id, $prestamos_multas_id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    
    /**
     * Finds the PrestamosHasMultas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $prestamos_prestamos_id
     * @param integer $prestamos_multas_id
     * @return PrestamosHasMultas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prestamos_prestamos_id, $prestamos_multas_id)
    {
        if (($model = PrestamosHasMultas::findOne(['prestamos_prestamos_id' => $prestamos_prestamos_id, 'prestamos_multas_id' => $prestamos_multas_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
