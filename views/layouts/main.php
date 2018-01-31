<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['index']],
            ['label' => '¡Sube un producto!', 'url' => ['/productos/subir']],
            ['label' => 'Productos en venta', 'items' => [
                ['label' => 'Todas las categorías', 'url' => ['/productos/producto']],
                ['label'=>'Libros,Cómics,Películas y Música','url'=>['/productos/libros']],
                ['label'=>'Decoración y Muebles','url'=>['/productos/deco']],
                ['label'=>'Videojuegos y Electrónica','url'=>['/productos/game']],
                ['label'=>'Deportes y Ocio','url'=>['/productos/deporte']],
                ['label'=>'Moda y Accesorios','url'=>['/productos/moda']],
                     
                
            ]],
            ['label'=>'Tus productos', 'items'=> 
               [ ['label' => 'Comprados', 'url' => ['/productos/compradop']],
                ['label' => 'Vendidos', 'url' => ['/productos/vendidos']],
                   ]],
            
            ['label' => 'Chat', 'items' => [
                ['label'=>'Bandeja de entrada','url'=>['/chats/recibidos']],
                ['label'=>'Bandeja de salida','url'=>['/chats/enviados']],
            ]],
        
         
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login'],'linkOptions'=>['class'=>'modal1']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->usuario . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
