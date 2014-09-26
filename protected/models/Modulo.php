<?php

/**
 * This is the model class for table "modulo".
 *
 * The followings are the available columns in table 'modulo':
 * @property integer $idModulo
 * @property string $NombreModulo
 * @property string $Url
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property Modulorol[] $modulorols
 */
class Modulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreModulo, Url', 'required'),
			array('Estado', 'numerical', 'integerOnly'=>true),
			array('NombreModulo', 'length', 'max'=>40),
			array('Url', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idModulo, NombreModulo, Url, Estado', 'safe', 'on'=>'search'),
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
			'modulorol' => array(self::HAS_MANY, 'ModuloRol', 'Modulo_idModulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idModulo' => 'Id Modulo',
			'NombreModulo' => 'Nombre Modulo',
			'Url' => 'Url',
			'Estado' => 'Estado',
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

		$criteria->compare('idModulo',$this->idModulo);
		$criteria->compare('NombreModulo',$this->NombreModulo,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('Estado',$this->Estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
