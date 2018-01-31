<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprados".
 *
 * @property int $id_venta
 * @property int $id_producto
 * @property int $id_comprador
 * @property string $fecha_compra
 * @property string $direccion_envio
 *
 * @property Productos $producto
 * @property Usuarios $comprador
 */
class Comprados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_comprador'], 'integer'],
            [['fecha_compra'], 'safe'],
            [['direccion_envio'], 'string', 'max' => 255],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
            [['id_comprador'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_comprador' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_venta' => 'Id Venta',
            'id_producto' => 'Id Producto',
            'id_comprador' => 'Id Comprador',
            'fecha_compra' => 'Fecha Compra',
            'direccion_envio' => 'Direccion Envio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprador()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_comprador']);
    }
    
    public static function find()
    {
        return new CompradosQuery(get_called_class());
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
       $this->fecha_compra=date("Y/m/d");
        return parent::beforeSave($insert);
    }
}
