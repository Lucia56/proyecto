<?php


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;





$this->title = 'Enviar mensaje';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-enviar">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    
                    <?= $form->field($model, 'id_remitente')->textarea(['rows' => 1,
                            "value"=>Yii::$app->user->identity->id_usuario,
                            "readonly"=>true,
                        ]) ?>
                  
            
                <?= $form->field($model, 'id_destinatario')->dropDownList(
                     ArrayHelper::map($usuarios,'id_usuario','usuario'),
                        ['prompt'=>'Selecciona un destinatario']
                     );?>

                 
                    <?= $form->field($model, 'mensaje')->textarea(['rows' => 6]) ?>
                   
                    
                    
                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                 

            </div>
        </div>

   
</div>
