<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idUsuario
 * @property string $Foto
 * @property string $Nombre
 * @property string $Apellido
 * @property string $NombreEmpresa
 * @property string $Email
 * @property string $Celular
 * @property string $Direccion
 * @property integer $CategoriaUsuario_idCategoriaUsuario
 * @property integer $Rol_idRol
 * @property string $Usuario
 * @property string $Clave
 *
 * The followings are the available model relations:
 * @property Reserva[] $reservas
 * @property Categoriausuario $categoriaUsuarioIdCategoriaUsuario
 * @property Rol $rolIdRol
 * @property Usuariointeres[] $usuariointeres
 * @property Vitrina[] $vitrinas
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Foto, Nombre, Apellido, Email, Celular, CategoriaUsuario_idCategoriaUsuario, Rol_idRol, Usuario, Clave', 'required'),
			array('CategoriaUsuario_idCategoriaUsuario, Rol_idRol', 'numerical', 'integerOnly'=>true),
			array('Foto', 'length', 'max'=>80),
			array('Nombre, Email', 'length', 'max'=>30),
			array('Apellido, Direccion', 'length', 'max'=>40),
			array('NombreEmpresa', 'length', 'max'=>45),
			array('Celular', 'length', 'max'=>15),
			array('Usuario', 'length', 'max'=>50),
			array('Clave', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, Foto, Nombre, Apellido, NombreEmpresa, Email, Celular, Direccion, CategoriaUsuario_idCategoriaUsuario, Rol_idRol, Usuario, Clave', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'reservas' => array(self::HAS_MANY, 'Reserva', 'Usuario_idUsuario'),
			'categoriaUsuarioIdCategoriaUsuario' => array(self::BELONGS_TO, 'CategoriaUsuario', 'CategoriaUsuario_idCategoriaUsuario'),
			'rolIdRol' => array(self::BELONGS_TO, 'Rol', 'Rol_idRol'),
			'usuariointeres' => array(self::HAS_MANY, 'Usuariointeres', 'Usuario_idUsuario'),
			'vitrinas' => array(self::HAS_MANY, 'Vitrina', 'Usuario_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'Foto' => 'Foto',
			'Nombre' => 'Nombre',
			'Apellido' => 'Apellido',
			'NombreEmpresa' => 'Nombre Empresa',
			'Email' => 'Email',
			'Celular' => 'Celular',
			'Direccion' => 'Direccion',
			'CategoriaUsuario_idCategoriaUsuario' => 'Categoria Usuario',
			'Rol_idRol' => 'Rol',
			'Usuario' => 'Usuario',
			'Clave' => 'Clave',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('Foto',$this->Foto,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellido',$this->Apellido,true);
		$criteria->compare('NombreEmpresa',$this->NombreEmpresa,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Celular',$this->Celular,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CategoriaUsuario_idCategoriaUsuario',$this->CategoriaUsuario_idCategoriaUsuario);
		$criteria->compare('Rol_idRol',$this->Rol_idRol);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Clave',$this->Clave,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
