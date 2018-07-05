<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface {

    const ROL_ADMIN = 10;
    const ROL_USER = 1;
    const ACTIVO = 1;

    static public function getRoles() {
        return [
            self::ROL_ADMIN => 'Administrador',
            self::ROL_USER => 'Usuario común',

        ];
    }

    public static function tableName(){
        return 'user';
    }

    public function rules() {
        return [
            [['usuario','rol'], 'required'],
            ['usuario', 'unique'],
            [['usuario'], 'string', 'max'=>64],
            [['clave', 'email'], 'string', 'max'=>128],
            ['rol', 'integer'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels(){

    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findByUsername($usuario){
        return static::findOne(['usuario'=> $usuario, 'activo'=>self::ACTIVO]);
    }

    public static function findIdentityByAccessToken ($token,$type=null){
        throw new \yii\base\NotSupportedException('No está implemetado "findIdentityByAccessToken"');
    }

    public function getId(){
        return $this->getPrimaryKey();
    }

    public function validatePassword($clave){
        return Yii::$app->getSecurity()->validatePassword($clave, $this->clave);
    }

    static public function getHash($clave){
        return Yii::$app->getSecurity()->generatePasswordHash($clave);
    }

    public function getAuthKey() {
    }

    public function validateAuthKey($authKey){
    }

    public  function beforeSave($insert){

            if (!parent::beforeSave($insert)) {
                return false;
            }

            if(!empty($this->clave)){
            $this->clave = $this->getHash($this->clave);
            }else {
                unset($this->clave);
            }
            return true;
    }
    
}