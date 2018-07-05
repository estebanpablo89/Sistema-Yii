<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "escuela".
 *
 * @property int $id Id
 * @property string $nombre Nombre
 * @property string $direccion Dirección
 * @property string $email Correo electrónico
 * @property string $telefono Teléfono
 */
class Escuela extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escuela';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'email', 'telefono'], 'required'],
            [['nombre', 'telefono'], 'string', 'max' => 64],
            [['direccion', 'email'], 'string', 'max' => 128],
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
            'direccion' => 'Dirección',
            'email' => 'Correo electrónico',
            'telefono' => 'Teléfono',
        ];
    }
}
