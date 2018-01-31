<?php

namespace app\models;



/**
 * This is the model class for table "chats".
 *
 * @property int $id_mensaje
 * @property int $id_remitente
 * @property int $id_destinatario
 * @property string $fecha
 * @property string $mensaje
 *
 * @property Usuarios $remitente
 * @property Usuarios $destinatario
 */
class Chats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_remitente', 'id_destinatario'], 'integer'],
            [['fecha'], 'safe'],
            [['mensaje'], 'string'],
            [['id_remitente'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_remitente' => 'id_usuario']],
            [['id_destinatario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_destinatario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mensaje' => 'Id Mensaje',
            'id_remitente' => 'Id Remitente',
            'id_destinatario' => 'Id Destinatario',
            'fecha' => 'Fecha',
            'mensaje' => 'Mensaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemitente()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_remitente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestinatario()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_destinatario']);
    }

    /**
     * @inheritdoc
     * @return ChatsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChatsQuery(get_called_class());
    }
    public function beforeSave($insert) {
        parent::beforeSave($insert);
       $this->fecha=date("Y/m/d/H");
        return parent::beforeSave($insert);
    }
    
}