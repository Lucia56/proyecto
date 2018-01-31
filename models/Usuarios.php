<?php

namespace app\models;

use Yii;
use yii\captcha\Captcha;
use yii\captcha\CaptchaAction;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id_usuario
 * @property string $usuario
 * @property string $password
 *
 * @property Mensajes[] $mensajes
 * @property Mensajes[] $mensajes0
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $password_repeat;
      public $codigo;
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'password'], 'string', 'max' => 255],
            [['usuario', 'password', 'password_repeat'], 'required', 'message' => 'El campo {attribute} es obligatorio'],
        
            ['usuario', 'unique', 'message' => 'El usuario ya existe en el sistema'],
            ['password', 'string', 'min' => 4, 'message' => 'la contraseña debe tener al menos 6 caracteres'],
           
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'operator' => '==', 'message' => 'Las contraseñas deben coincidir'],
           
            ['codigo', 'codeVerify'],
            ['codigo','required','message'=>'Debes escribir algo en los codigos'],
            
           
            [['password_repeat', 'password', 'usuario', 'codigo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'usuario' => 'Usuario',
            'password' => 'Password',
            'password_repeat' => 'Repite la contraseña',
            'codigo' => 'Escribe los codigos que ves'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function codeVerify($attribute) {
        /* nombre de la accion del controlador */
        $captcha_validate = new  \yii\captcha\CaptchaAction('captcha', Yii::$app->controller);
        
        
        if ($this->$attribute) {
            $code = $captcha_validate->getVerifyCode();
            if ($this->$attribute != $code) {
                $this->addError($attribute, 'Ese codigo de verificacion no es correcto');
            }
        }
        
    }
    public function getMensajes()
    {
        return $this->hasMany(Mensajes::className(), ['id_remitente' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensajes0()
    {
        return $this->hasMany(Mensajes::className(), ['id_destinatario' => 'id_usuario']);
    }

    /**
     * @inheritdoc
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }
    
    public static function findIdentity($id) {
        return static::findOne(['id_usuario' => $id]);
    }

    public static function findByUsername($username) {
        return static::findOne(['usuario' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /* public function validatePassword($password)
      {
      return Yii::$app->security->validatePassword($password, $this->password_hash);
      } */

    public function validatePassword($password) {
        return $this->password === $password;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return null;
    }
    
   
  
   

}
