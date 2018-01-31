<?php
namespace app\controllers;
use Yii;
use app\models\Productos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Comprados;
use yii\filters\AccessControl;


/**
 * Description of productosController
 *
 * @author Lucía
 */
class ProductosController extends Controller {
  
      public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['subir','compradop','vendidos'],
                'rules' => [
                    
     
                    [
                        'actions' => ['subir','compradop','vendidos'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /*ir a la sección producto*/
   public function actionProducto()
    {
        $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
        
        $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery]/*['id_producto'=>$compradosQuery]*/)->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
        
    }

 

   /*Subir un producto*/
    public function actionSubir() {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->upload()) {
                $model->save();
                return $this->refresh();
            }
        }

        return $this->render('subir', [
                    'model' => $model,
        ]);
    }
    
   
    
    
    
    
    public function actionView($id_producto) {
        $modelo= Productos::find();
        
            $dataProvider = new ActiveDataProvider([
                'query'=>Chats::find()->where(
                        [ 'id_producto'=>$id_producto]),
            ]);
        return $this->renderAjax('view', [
                  'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
    }
    
    
     public function actionDelete($id) {
    
        $this->findModel($id)->delete();

        return $this->redirect(['producto']);
    }
      protected function findModel($id_producto) {
        if (($model = Productos::findOne($id_producto)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
       
   
       public function actionCompradop()
    {
        $compradosQuery = Comprados::find()->select('id_producto')->from('comprados')->where(['id_comprador'=>Yii::$app->user->identity->id_usuario])->orderBy('fecha_compra DESC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['id_producto'=>$compradosQuery]),
           
        ]);

        return $this->render('productocomprado', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
        
    }
    
         public function actionVendidos()
    {
        $compradosQuery = Comprados::find()->select('id_producto')->from('comprados')->orderBy('fecha_compra DESC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['id_producto'=>$compradosQuery])->andWhere(['id_vendedor'=>Yii::$app->user->identity->id_usuario] ),
           
        ]);

        return $this->render('productovendido', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
        
    }

    /*filtros*/
   
       public function actionLibros(){
           $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
           $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery])->andWhere(['categoria'=>'Libros,Cómics,Películas y Música'])->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
       }
       
        public function actionDeco(){
           $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
           $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery])->andWhere(['categoria'=>'Decoración y Muebles'])->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
       }
       
        public function actionGame(){
           $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
           $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery])->andWhere(['categoria'=>'Videojuegos y Electrónica'])->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
       }
       
        public function actionDeporte(){
           $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
           $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery])->andWhere(['categoria'=>'Deportes y Ocio'])->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
       }
       
        public function actionModa(){
           $compradosQuery = Comprados::find()->select('id_producto')->from('comprados');
           $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['not in', 'id_producto', $compradosQuery])->andWhere(['categoria'=>'Moda y Accesorios'])->orderBy('fecha DESC')->orderBy('fecha_oferta DESC'),
            
        ]);

        return $this->render('producto', [
                    'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
        ]);
       }

}
