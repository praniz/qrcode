<?php

/**
 * This is the model class for table "qr_question_set".
 *
 * The followings are the available columns in table 'qr_question_set':
 * @property integer $idqr_question_set
 * @property string $title
 * @property string $insert_name
 * @property string $insert_date
 * @property integer $use_yn
 * @property string $qrcode
 *
 * The followings are the available model relations:
 * @property QrQuestion[] $qrQuestions
 */
class QrQuestionSet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qr_question_set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('insert_name, insert_date', 'required'),
			array('use_yn', 'numerical', 'integerOnly'=>true),
			array('title, qrcode', 'length', 'max'=>45),
			array('insert_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idqr_question_set, title, insert_name, insert_date, use_yn, qrcode', 'safe', 'on'=>'search'),
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
			'qrQuestions' => array(self::HAS_MANY, 'QrQuestion', 'idqr_question_set'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idqr_question_set' => 'รหัส',
			'title' => 'หัวข้อ',
			'insert_name' => 'ผู้สร้าง',
			'insert_date' => 'วันที่สร้าง',
			'use_yn' => 'การใช้งาน',
			'qrcode' => 'Qr Code',
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

		$criteria->compare('idqr_question_set',$this->idqr_question_set);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('insert_name',$this->insert_name,true);
		$criteria->compare('insert_date',$this->insert_date,true);
		$criteria->compare('use_yn',$this->use_yn);
		$criteria->compare('qrcode',$this->qrcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QrQuestionSet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
