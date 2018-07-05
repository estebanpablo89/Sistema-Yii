<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $id ID
 * @property string $nombre Nombre
 * @property string $apellido Apellido
 * @property string $fecha_nacimiento Fecha de Nacimiento
 * @property string $email Correo Electrónico
 * @property string $telefono Teléfono
 *
 * @property Vehiculos[] $vehiculos
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'fecha_nacimiento', 'email', 'telefono'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido', 'telefono'], 'string', 'max' => 64],
            [['email'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'email' => 'Correo Electrónico',
            'telefono' => 'Teléfono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculos::className(), ['id_persona' => 'id']);
    }

    public function getEdad (){
        $nacimiento = new \DateTime($this->fecha_nacimiento);
        $hoy = new \DateTime();
        $diff = $hoy->diff($nacimiento);
        return "{$diff->y} años, {$diff->m} meses";
    }
}
