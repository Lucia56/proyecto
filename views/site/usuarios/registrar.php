<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Registrar';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-form">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col-lg-5">

        <?php
        $form = ActiveForm::begin([
            'id' => 'registrar-form',
        ]);

        ?>

        <?= $form->field($model, 'usuario')->textInput(['maxlength' => true])
        ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]); ?>        

        <?=
        $form->field($model, 'codigo')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            'imageOptions' => [
                'id' => 'my-captcha-image'
            ],
            'options' => [
                'placeholder' => 'Escribe el codigo aqui'
            ]
        ])
        ?>
  

        <div class="form-group">
<?= Html::submitButton('Registrame', ['class' => 'btn btn-success']) ?>
        </div>

<?php ActiveForm::end(); ?>

    </div>


</div>




