<?php

/**
 * This is the model class for table "qr_type".
 *
 * The followings are the available columns in table 'qr_type':
 * @property integer $idqr_type
 * @property string $name
 * @property string $desc
 * @property integer $type
 * @property integer $check_img
 *
 * The followings are the available model relations:
 * @property QrQuestion[] $qrQuestions
 * @property QrTypeDetail[] $qrTypeDetails
 */
class QrType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qr_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('type', 'length', 'max'=>5),
			array(' check_img', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('desc', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idqr_type, name, desc, type, check_img', 'safe', 'on'=>'search'),
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
			'qrQuestions' => array(self::HAS_MANY, 'QrQuestion', 'idqr_type'),
			'qrTypeDetails' => array(self::HAS_MANY, 'QrTypeDetail', 'idqr_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idqr_type' => 'รหัส',
			'name' => 'รูปแบบ',
			'desc' => 'รายละเอียด',
			'type' => 'ชนิด',
			'check_img' => 'รูป',
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

		$criteria->compare('idqr_type',$this->idqr_type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('check_img',$this->check_img);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QrType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
