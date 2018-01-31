

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos que ya has comprado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productosComprados-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            
            
           
            'producto',
            
            'precio',
           
            
          
            'categoria',
         
            'localizacion',
          
            
        ],
       
    
    ]);
 
    ?>
    
</div>
</div>

