<?php
namespace app\controllers;
use Yii;
use app\models\Chats;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Usuarios;
use app\models\Productos;




class ChatsController extends Controller {
 
          public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['recibidos','enviados'],
                'rules' => [
                    
     
                    [
                        'actions' => ['recibidos','enviados'],
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

        public function actionRecibidos()
    {
            $modelo= Chats::find();
            $dataProvider = new ActiveDataProvider([
                'query'=>Chats::find()->where(
                        [ 'id_destinatario'=>Yii::$app->user->identity->id_usuario])->orderBy('fecha DESC'),
            ]);
            
            return $this->render('recibidos',[
                'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
            ]);
        
       
    }
  
    
     public function actionEnviados()
    {
            $modelo= Chats::find();
            $dataProvider = new ActiveDataProvider([
                'query'=>Chats::find()->where(
                        [ 'id_remitente'=>Yii::$app->user->identity->id_usuario])->orderBy('fecha DESC')
            ]);
            
          
            return $this->render('enviados',[
                'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
                   
            ]);
        
       
    }
    
    
    
      public function actionEnviar($id_destinatario=null)
    {
          
      $model = new Chats();
      
       
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
                    return $this->refresh();
            }
       
      
        $model->id_destinatario=$id_destinatario;
        return $this->render('enviar', [
                    'model' => $model,
                   
                    
        ]);
    
       
    }
    
    public function actionEnviar1($id_vendedor=null)
    {
          
      $model = new Chats();
            
       
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
                    return $this->refresh();
            }
       
      
       
        return $this->render('enviar1', [
                    'model' => $model,
                    'usuarios'=>  Usuarios::find()->all()
                    
        ]);
    
       
    }
    
 
      public function actionEnviar2($id_vendedor=null)
    {
          
      $model = new Chats();
      
       
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
                    return $this->refresh();
            }
       
      
         $model->id_destinatario=$id_vendedor;
        return $this->render('enviar2', [
                    'model' => $model,
                    
        ]);
    
       
    }
    
     public function actionDelete($id){
    
        $this->findModel($id)->delete();

        return $this->redirect(['recibidos']);
    }
  
    
      protected function findModel($id_mensaje) {
        if (($model = Chats::findOne($id_mensaje))!== null) {
            return $model;
        } 
    }
    
    public function actionView($id_remitente){
          $modelo= Chats::find();
            $dataProvider = new ActiveDataProvider([
                'query'=>Chats::find()->where(
                        [ 'id_remitente'=>$id_remitente])->orWhere(['id_destinatario'=>$id_remitente])->orderBy('fecha ASC'),
            ]);
            
            return $this->renderAjax('recibidos',[
                'dataProvider' => $dataProvider,
                    'modelo' => $modelo,
            ]);
        
    }
    
   
    
    
}
