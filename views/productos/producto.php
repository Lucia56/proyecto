<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos en venta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>
<p>
        <?= Html::a('¡Súbelo!', ['subir'], ['class' => 'btn btn-success']) ?>
    </p>
   
<div class="card" style="width: 18rem;">

    <?=
      
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
             [
                'attribute' => 'foto',
                'format' => 'image',
                'value' => function ($model) {
                    return $model->getImagen();
                },
                'contentOptions' => ['class' => 'grid-productos'],
            ],
            
            'vendedor.usuario',
           
            'producto',
            
            'precio',
            'fecha_oferta',
            
          
            'categoria',
            'descripcion',
            'localizacion',
          
            [
                 'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {shop} {delete} {enviar}',
                'buttons' => [
                    'shop'=>function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-shopping-cart"></span>',['/comprados/comprar','id_producto'=>$model->id_producto]);
                    },
                       'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/productos/view','id_producto'=>$model->id_producto],['class'=>'modalProducto']);
                    }, 
                    'enviar'=>function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-send"></span>',['/chats/enviar2','id_vendedor'=>$model->id_vendedor]);
                    },
                            ]
                            
                     
               
            ],
            
        ],
       
    
    ]);
    echo \app\widgets\Modal::widget([
    "boton"=>"modalProducto",
      
    ]);
    ?>
    
</div>
</div>
