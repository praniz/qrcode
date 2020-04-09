<?php

/**
 * This is the model class for table "qr_type_detail".
 *
 * The followings are the available columns in table 'qr_type_detail':
 * @property integer $idqr_type_detail
 * @property string $image
 * @property integer $value_type
 * @property string $ans_type
 */
class QrTypeDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qr_type_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('value_type', 'required'),
			array('value_type', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>45),
			array('ans_type', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idqr_type_detail, image, value_type, ans_type', 'safe', 'on'=>'search'),
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
			'idqr_type_detail' => 'รหัส',
			'image' => 'รูปภาพ',
			'value_type' => 'คะแนน',
			'ans_type' => 'รูปแบบอ้างอิง',
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

		$criteria->compare('idqr_type_detail',$this->idqr_type_detail);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('value_type',$this->value_type);
		$criteria->compare('ans_type',$this->ans_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QrTypeDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
