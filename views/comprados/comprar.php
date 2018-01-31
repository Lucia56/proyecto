<?php



use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Productos;
//use yii\jui\DatePicker;



$this->title = 'Comprar Producto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comprados-comprar">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                  <?= $form->field($model, 'id_comprador')->textarea(['rows' => 1,
                            "value"=>Yii::$app->user->identity->id_usuario,
                            "readonly"=>true,
                        ]) ?>
                  
                <?= $form->field($model, 'id_producto')->textInput([ "readonly"=>true,]) ?> 
             
                <?= $form->field($model, 'direccion_envio')->textarea(['rows' => 1]) ?> 
              
               
                
                  
                    
                    <div class="form-group">
                        <?= Html::submitButton('Comprar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                      
                    </div>

                <?php ActiveForm::end(); ?>
                 

            </div>
        </div>

   
</div>
