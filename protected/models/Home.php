<?php

/**
 * This is the model class for table "tb_home".
 *
 * The followings are the available columns in table 'tb_home':
 * @property integer $idtb_home
 * @property string $pic_name
 * @property string $pic_detail_th
 * @property string $pic_detail
 */
class Home extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_home';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_name', 'length', 'max'=>45),
			array('pic_detail_th, pic_detail', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtb_home, pic_name, pic_detail_th, pic_detail', 'safe', 'on'=>'search'),
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
			'idtb_home' => 'Idtb Home',
			'pic_name' => 'Pic Name',
			'pic_detail_th' => 'Pic Detail Th',
			'pic_detail' => 'Pic Detail',
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

		$criteria->compare('idtb_home',$this->idtb_home);
		$criteria->compare('pic_name',$this->pic_name,true);
		$criteria->compare('pic_detail_th',$this->pic_detail_th,true);
		$criteria->compare('pic_detail',$this->pic_detail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Home the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
