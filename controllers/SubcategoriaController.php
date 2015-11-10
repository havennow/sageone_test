<?php

namespace app\controllers;

use Yii;
use app\models\SageSubcategoria;
use app\models\SageSubcategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * SubcategoriaController implements the CRUD actions for SageSubcategoria model.
 */
class SubcategoriaController extends Controller
{
    public function behaviors()
    {
        return [
			'access' => [
			            'class' => AccessControl::className(),
			            'rules' => [
			                [
			                    'allow' => true,
			                    'roles' => ['@'],
			                ],

			            ],
			        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],'categorialist' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SageSubcategoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SageSubcategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SageSubcategoria model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SageSubcategoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SageSubcategoria();
		$categoria_model= \app\models\SageCategoria::find()->all();				

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'categoria_model'=>$categoria_model
            ]);
        }
    }

    /**
     * Updates an existing SageSubcategoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$categoria_model= \app\models\SageCategoria::find()
			->where(['id'=>$model->id_categoria])
		    ->all();				
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'categoria_model'=>$categoria_model
            ]);
        }
    }

    /**
     * Deletes an existing SageSubcategoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	public function actionCategorialist()
	{
		$out='';
	    $request = Yii::$app->request;

	    if($request->isAjax)
	    {
   
	    if (isset($_POST['depdrop_parents'])) {
	        $parents = $_POST['depdrop_parents'];
	        if ($parents != null) {
	            $id_categoria = $parents[0];
            
		
	    if($id_categoria != NULL)
	    {
	   
	    $categorias = SageSubCategoria::find()
          
                ->where(['id_categoria' => $id_categoria])
	            ->orderBy('nome DESC')
	            ->all();

	    if($categorias != NULL){
	        foreach($categorias as $categoria){
				$out[]=['id'=>$categoria->id, 'name'=>$categoria->nome];
			
	       }
	      }
	     }
	    }
	   }
	  }
	  echo Json::encode(['output'=>$out, 'selected'=>'']);
	  return;

	  }

    /**
     * Finds the SageSubcategoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SageSubcategoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SageSubcategoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
