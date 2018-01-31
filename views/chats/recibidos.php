<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recibidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-recibidos">

    <h1><?= Html::encode($this->title) ?></h1>

   <p>
        <?= Html::a('Menasaje nuevo', ['enviar1'], ['class' => 'btn btn-success']) ?>
    </p>
    
<div class="card" style="width: 18rem;">

    <?=
      
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
           
           'remitente.usuario',
            'mensaje',
            'fecha',
           
            [
                 'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {enviar} {view}',
                'buttons' => [
                     
                   'enviar'=>function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-send"></span>',['/chats/enviar','id_destinatario'=>$model->id_destinatario]);
                    },
                    
                     'view'=>function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['/chats/view','id_remitente'=>$model->id_remitente],['class'=>'modalView']);
                    },
                  
                            ]
          
                    
          
           
            
        ],
       ],
    
    ]);
echo \app\widgets\Modal::widget([
    "boton"=>"modalView",
      
    ]);
   ?>
    
</div>
</div>
