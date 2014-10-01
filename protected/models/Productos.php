<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $idProductos
 * @property string $Foto
 * @property string $NombreProducto
 * @property string $DescripcionTecnologia
 * @property string $PalabrasClaves
 * @property string $EstadoDesarrollo
 * @property string $EstadoPL
 * @property string $InteresComercial
 * @property integer $Vitrina_idVitrina
 * @property integer $Categoria_idCategoria
 *
 * The followings are the available model relations:
 * @property Categoria $categoriaIdCategoria
 * @property Vitrina $vitrinaIdVitrina
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Foto, NombreProducto, DescripcionTecnologia, PalabrasClaves, EstadoDesarrollo, EstadoPL, InteresComercial, Vitrina_idVitrina, Categoria_idCategoria', 'required'),
			array('Vitrina_idVitrina, Categoria_idCategoria', 'numerical', 'integerOnly'=>true),
			array('Foto', 'length', 'max'=>80),
			array('NombreProducto', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductos, Foto, NombreProducto, DescripcionTecnologia, PalabrasClaves, EstadoDesarrollo, EstadoPL, InteresComercial, Vitrina_idVitrina, Categoria_idCategoria', 'safe', 'on'=>'search'),
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
			'categoriaIdCategoria' => array(self::BELONGS_TO, 'Categoria', 'Categoria_idCategoria'),
			'vitrinaIdVitrina' => array(self::BELONGS_TO, 'Vitrina', 'Vitrina_idVitrina'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductos' => 'Id Productos',
			'Foto' => 'Foto',
			'NombreProducto' => 'Nombre Producto',
			'DescripcionTecnologia' => 'Descripcion Tecnologia',
			'PalabrasClaves' => 'Palabras Claves',
			'EstadoDesarrollo' => 'Estado Desarrollo',
			'EstadoPL' => 'Estado Pl',
			'InteresComercial' => 'Interes Comercial',
			'Vitrina_idVitrina' => 'Vitrina Id Vitrina',
			'Categoria_idCategoria' => 'Categoria',
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

		$criteria->compare('idProductos',$this->idProductos);
		$criteria->compare('Foto',$this->Foto,true);
		$criteria->compare('NombreProducto',$this->NombreProducto,true);
		$criteria->compare('DescripcionTecnologia',$this->DescripcionTecnologia,true);
		$criteria->compare('PalabrasClaves',$this->PalabrasClaves,true);
		$criteria->compare('EstadoDesarrollo',$this->EstadoDesarrollo,true);
		$criteria->compare('EstadoPL',$this->EstadoPL,true);
		$criteria->compare('InteresComercial',$this->InteresComercial,true);
		$criteria->compare('Vitrina_idVitrina',$this->Vitrina_idVitrina);
		$criteria->compare('Categoria_idCategoria',$this->Categoria_idCategoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
