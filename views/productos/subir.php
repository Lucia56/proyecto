<?php


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//use yii\jui\DatePicker;
use   yii\web\UploadedFile;


$this->title = 'Subir Producto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-enviar">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    
                    <?= $form->field($model, 'id_vendedor')->textarea(['rows' =>1,
                            "value"=>Yii::$app->user->identity->id_usuario,
                            "readonly"=>true,
                        ]) ?>
                  
                
                    <?= $form->field($model, 'producto')->textarea(['producto'=>1]) ?>
                    <?= $form->field($model, 'precio')->textarea(['precio'=>1]) ?>
                    <?= $form->field($model, 'categoria')->dropDownList(['Libros,Cómics,Películas y Música'=> 'Libros,Cómics,Películas y Música',
                                                                         'Decoración y Muebles'=>'Decoración y Muebles',
                                                                          'Videojuegos y Electrónica'=>'Videojuegos y Electrónica',
                                                                          'Deportes y Ocio'=>'Deportes y Ocio',
                                                                          'Moda y Accesorios'=>'Moda y Accesorios',
                                                                                                ]) ?>
                    <?= $form->field($model, 'descripcion')->textarea(['descripcion'=>6]) ?>
                <?= $form->field($model, 'localizacion')->textarea(['localizacion'=>1]) ?>
                   <?= app\widgets\Upload::widget([
                         "form"=>$form,
                            "model"=>$model,
                            "nombre"=>"foto",
                        ]); ?>
                    
                    
                    <div class="form-group">
                        <?= Html::submitButton('¡Súbelo!', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                 

            </div>
        </div>

   
</div>
