<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\base\InvalidCallException;
use app\models\Lectores;
use app\models\LectoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

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

    public function actionView($id) {
        $model = $this->findModel($id);
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lectores_id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
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
        				if($model->save()) {
            			return $this->redirect(['index', 'id' => $model->lectores_id]);
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
/**    public function actionDelete($id)
*    {
*        $this->findModel($id)->delete();

*        return $this->redirect(['index']);
*    }
*/

    public function actionDelete($id) 
    {
        $post = Yii::$app->request->post();
    	Yii::trace('Entering delete action');
    	if (Yii::$app->request->isAjax && isset($post['custom_param'])) {
    		if ($this->findModel($id)->delete()) {
    			echo Json::encode([
    				'success' => true,
    				'messages' => [
    					'kv-detail-info' => 'El lector # ' . $id . ' ha sido exitosamente eliminado. <a href="' .
    					Url::to(['/lectores/index']) . '" class="btn btn-sm btn-info">' .
    					'<i class="glyphicon glyphicon-hand-right"></i>  Click aqui</a> para continuar.'
    				]
    			]);
    		} else {
    			echo Json::encode([
   					'success' => false,
   					'messages' => [
						'kv-detail-error' => 'No puede eliminarse al lector # ' . $id . '.'
   					]
    			]);
    		}
    		return;
    	} elseif (Yii::$app->request->post()) {
    		$this->findModel($id)->delete();
    		return $this->redirect(['index']);
    	}
    	throw new InvalidCallException("Ud no tiene permitido realizar esta operacion. Contactese con el administrador.");
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
