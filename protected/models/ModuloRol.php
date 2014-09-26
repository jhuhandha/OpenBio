<?php

/**
 * This is the model class for table "modulorol".
 *
 * The followings are the available columns in table 'modulorol':
 * @property integer $Modulo_idModulo
 * @property integer $Rol_idRol
 *
 * The followings are the available model relations:
 * @property Modulo $moduloIdModulo
 * @property Rol $rolIdRol
 */
class ModuloRol extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modulorol';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Modulo_idModulo, Rol_idRol', 'required'),
			array('Modulo_idModulo, Rol_idRol', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Modulo_idModulo, Rol_idRol', 'safe', 'on'=>'search'),
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
			'moduloIdModulo' => array(self::BELONGS_TO, 'Modulo', 'Modulo_idModulo'),
			'rolIdRol' => array(self::BELONGS_TO, 'Rol', 'Rol_idRol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Modulo_idModulo' => 'Modulo Id Modulo',
			'Rol_idRol' => 'Rol Id Rol',
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

		$criteria->compare('Modulo_idModulo',$this->Modulo_idModulo);
		$criteria->compare('Rol_idRol',$this->Rol_idRol);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ModuloRol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
