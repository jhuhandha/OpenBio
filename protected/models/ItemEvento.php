<?php

/**
 * This is the model class for table "itemevento".
 *
 * The followings are the available columns in table 'itemevento':
 * @property integer $idItemEvento
 * @property integer $Estado
 * @property string $HoraInicio
 * @property string $HoraFinal
 * @property string $Actividad
 * @property string $Detalle
 * @property integer $Evento_idEvento
 * @property integer $Vitrina_idVitrina
 * @property integer $EstadoEvento_idEstadoEvento
 */
class ItemEvento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itemevento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Estado, HoraInicio, HoraFinal, Actividad, Detalle, Evento_idEvento, Vitrina_idVitrina, EstadoEvento_idEstadoEvento', 'required'),
			array('Estado, Evento_idEvento, Vitrina_idVitrina, EstadoEvento_idEstadoEvento', 'numerical', 'integerOnly'=>true),
			array('Actividad, Detalle', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idItemEvento, Estado, HoraInicio, HoraFinal, Actividad, Detalle, Evento_idEvento, Vitrina_idVitrina, EstadoEvento_idEstadoEvento', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idItemEvento' => 'Id Item Evento',
			'Estado' => 'Estado',
			'HoraInicio' => 'Hora Inicio',
			'HoraFinal' => 'Hora Final',
			'Actividad' => 'Actividad',
			'Detalle' => 'Detalle',
			'Evento_idEvento' => 'Evento Id Evento',
			'Vitrina_idVitrina' => 'Vitrina Id Vitrina',
			'EstadoEvento_idEstadoEvento' => 'Estado Evento Id Estado Evento',
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

		$criteria->compare('idItemEvento',$this->idItemEvento);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('HoraInicio',$this->HoraInicio,true);
		$criteria->compare('HoraFinal',$this->HoraFinal,true);
		$criteria->compare('Actividad',$this->Actividad,true);
		$criteria->compare('Detalle',$this->Detalle,true);
		$criteria->compare('Evento_idEvento',$this->Evento_idEvento);
		$criteria->compare('Vitrina_idVitrina',$this->Vitrina_idVitrina);
		$criteria->compare('EstadoEvento_idEstadoEvento',$this->EstadoEvento_idEstadoEvento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemEvento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
