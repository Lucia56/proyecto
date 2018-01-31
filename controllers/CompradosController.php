<?php

namespace app\controllers;
 use Yii;
use app\models\Comprados;
use yii\web\Controller;

/**
 * Description of CompradosController
 *
 * @author Lucía
 */
class CompradosController extends Controller {
  
    
    public function actionComprar($id_producto=null)
    {
      $model=new Comprados();
        
      
       
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
                    return $this->refresh();
        }
        
        //$producto = \app\models\Productos::findOne(["id_producto"=>$id]);
       $model->id_producto=$id_producto;
              
        return $this->render('comprar', [
                    'model' => $model,
        ]);
    
       
    }
    
    
}
