<?php

/**
 * This is the model class for table "tb_about".
 *
 * The followings are the available columns in table 'tb_about':
 * @property integer $idtb_about
 * @property string $about_name
 * @property string $about_name_th
 * @property string $about_th
 * @property string $about
 * @property string $pic_about
 */
class About extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_about';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('about_name, about_name_th, pic_about', 'length', 'max'=>45),
			array('about_th, about', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtb_about, about_name, about_name_th, about_th, about, pic_about', 'safe', 'on'=>'search'),
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
			'idtb_about' => 'Idtb About',
			'about_name' => 'About Name',
			'about_name_th' => 'About Name Th',
			'about_th' => 'About Th',
			'about' => 'About',
			'pic_about' => 'Pic About',
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

		$criteria->compare('idtb_about',$this->idtb_about);
		$criteria->compare('about_name',$this->about_name,true);
		$criteria->compare('about_name_th',$this->about_name_th,true);
		$criteria->compare('about_th',$this->about_th,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('pic_about',$this->pic_about,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return About the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
