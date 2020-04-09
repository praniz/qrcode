<?php

/**
 * This is the model class for table "tb_member".
 *
 * The followings are the available columns in table 'tb_member':
 * @property integer $id_member
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $tel
 * @property string $email
 * @property string $address
 * @property integer $id_privilege
 *
 * The followings are the available model relations:
 * @property TbPrivilege $idPrivilege
 */
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, tel, address, id_privilege', 'required'),
			array('id_privilege', 'numerical', 'integerOnly'=>true),
			array('name, surname, username, password, tel, email, address', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_member, name, surname, username, password, tel, email, address, id_privilege', 'safe', 'on'=>'search'),
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
			'idPrivilege' => array(self::BELONGS_TO, 'TbPrivilege', 'id_privilege'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_member' => 'Id Member',
			'name' => 'Name',
			'surname' => 'Surname',
			'username' => 'Username',
			'password' => 'Password',
			'tel' => 'Tel',
			'email' => 'Email',
			'address' => 'Address',
			'id_privilege' => 'Id Privilege',
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

		$criteria->compare('id_member',$this->id_member);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('id_privilege',$this->id_privilege);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
