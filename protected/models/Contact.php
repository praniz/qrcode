<?php

/**
 * This is the model class for table "tb_contact".
 *
 * The followings are the available columns in table 'tb_contact':
 * @property integer $idtb_contact
 * @property string $contact
 * @property string $contactTime
 * @property string $tel
 * @property string $email
 * @property string $fax
 * @property string $contact_th
 */
class Contact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact, contact_th', 'length', 'max'=>100),
			array('contactTime, email, fax', 'length', 'max'=>45),
			array('tel', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtb_contact, contact, contactTime, tel, email, fax, contact_th', 'safe', 'on'=>'search'),
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
			'idtb_contact' => 'Idtb Contact',
			'contact' => 'Contact',
			'contactTime' => 'Contact Time',
			'tel' => 'Tel',
			'email' => 'Email',
			'fax' => 'Fax',
			'contact_th' => 'Contact Th',
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

		$criteria->compare('idtb_contact',$this->idtb_contact);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('contactTime',$this->contactTime,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('contact_th',$this->contact_th,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
