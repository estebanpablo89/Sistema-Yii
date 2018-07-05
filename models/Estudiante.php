<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $id Id
 * @property string $nombre Nombre
 * @property string $apellido Apellido
 * @property string $ci Cédula
 * @property string $email Correo Electrónico
 * @property string $telefono Teléfono
 * @property int $id_escuela Escuela
 *
 * @property Escuela $escuela
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'ci', 'email', 'telefono', 'id_escuela'], 'required'],
            [['id_escuela'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 64],
            [['ci'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 128],
            [['telefono'], 'string', 'max' => 30],
            [['id_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Escuela::className(), 'targetAttribute' => ['id_escuela' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'ci' => 'Cédula',
            'email' => 'Correo Electrónico',
            'telefono' => 'Teléfono',
            'id_escuela' => 'Escuela',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscuela()
    {
        return $this->hasOne(Escuela::className(), ['id' => 'id_escuela']);
    }
}
