<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido al mejor gestor de compra venta del mundo</h1>

        <p class="lead">Podrás vender y comprar todo lo que quieras</p>

 
        
        <p> <?= Html::a('<span class="btn btn-lg btn-success">¡Regístrate!</span>',['registrar']);?></p>
    </div>

   