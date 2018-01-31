<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id_producto
 * @property int $id_vendedor
 * @property string $producto
 * @property string $fecha_oferta
 * @property double $precio
 * @property string $foto
 * @property string $categoria
 * @property string $descripcion
 * @property string $localizacion
 *
 * @property Comprados[] $comprados
 * @property Usuarios $vendedor
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vendedor'], 'integer'],
            [['fecha_oferta'], 'safe'],
            [['precio'], 'number'],
            [['descripcion'], 'string'],
            [['producto', 'categoria', 'localizacion'], 'string', 'max' => 127],
             [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg',  message => '¡tiene que ser formato jpg o png!'],
            [['id_vendedor'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_vendedor' => 'id_usuario']],
              [['producto', 'descripcion', 'localizacion', 'categoria'] , required ,message => '¡no puede estar en blanco!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'id_vendedor' => 'Id Vendedor',
            'producto' => 'Producto',
            'fecha_oferta' => 'Fecha Oferta',
            'precio' => 'Precio',
            'foto' => 'Foto',
            'categoria' => 'Categoria',
            'descripcion' => 'Descripcion',
            'localizacion' => 'Localizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprados()
    {
        return $this->hasMany(Comprados::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedor()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_vendedor']);
    }
    
     public static function find()
    {
        return new ProductosQuery(get_called_class());
    }
    
     public function getImagen() {
        return Yii::$app->request->getBaseUrl() . '/imgs/' . $this->foto;
    }
    
     public function upload()
    {
        if ($this->validate()) {
            $this->foto->name=Yii::$app->user->identity->usuario. $this->foto->name;
            $this->foto->saveAs('imgs/' . $this->foto->name,false);
            return true;
        } else {
            return false;
        }
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
       $this->fecha_oferta=date("Y/m/d");
        return parent::beforeSave($insert);
    }
}
