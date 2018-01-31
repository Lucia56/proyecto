<?php

use yii\helpers\Html;

use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recibidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <p>
        <?= Html::a('Menasaje nuevo', ['enviar1'], ['class' => 'btn btn-success']) ?>
    </p>
    
<div class="col-6" style="">

    <?=
      
    DetailView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
           
           'remitente.usuario',
           
            'mensaje',
            'fecha',
           
            
       ],
    
    ]);
     
   ?>
    
</div>
</div>
