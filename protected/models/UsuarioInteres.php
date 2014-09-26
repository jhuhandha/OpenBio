<?php

/**
 * This is the model class for table "usuariointeres".
 *
 * The followings are the available columns in table 'usuariointeres':
 * @property integer $idUsuarioInteres
 * @property integer $Interes_idInteres
 * @property integer $Usuario_idUsuario
 *
 * The followings are the available model relations:
 * @property Interes $interesIdInteres
 * @property Usuario $usuarioIdUsuario
 */
class UsuarioInteres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuariointeres';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Interes_idInteres, Usuario_idUsuario', 'required'),
			array('Interes_idInteres, Usuario_idUsuario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuarioInteres, Interes_idInteres, Usuario_idUsuario', 'safe', 'on'=>'search'),
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
			'interesIdInteres' => array(self::BELONGS_TO, 'Interes', 'Interes_idInteres'),
			'usuarioIdUsuario' => array(self::BELONGS_TO, 'Usuario', 'Usuario_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuarioInteres' => 'Id Usuario Interes',
			'Interes_idInteres' => 'Interes Id Interes',
			'Usuario_idUsuario' => 'Usuario Id Usuario',
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

		$criteria->compare('idUsuarioInteres',$this->idUsuarioInteres);
		$criteria->compare('Interes_idInteres',$this->Interes_idInteres);
		$criteria->compare('Usuario_idUsuario',$this->Usuario_idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioInteres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
