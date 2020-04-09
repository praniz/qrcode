<?php

/**
 * This is the model class for table "qr_answer".
 *
 * The followings are the available columns in table 'qr_answer':
 * @property integer $idqr_answer
 * @property string $answer
 * @property integer $idqr_question
 * @property string $detail
 * @property integer $detail_check
 *
 * The followings are the available model relations:
 * @property QrQuestion $idqrQuestion
 */
class QrAnswer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qr_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer, idqr_question, detail, detail_check', 'required'),
			array('idqr_question, detail_check', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>45),
			array('detail', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idqr_answer, answer, idqr_question, detail, detail_check', 'safe', 'on'=>'search'),
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
			'idqrQuestion' => array(self::BELONGS_TO, 'QrQuestion', 'idqr_question'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idqr_answer' => 'รหัส',
			'answer' => 'คำตอบ',
			'idqr_question' => 'เลขที่อ้างอิงคำถาม',
			'detail' => 'รายละเอียด',
			'detail_check' => 'Detail Check',
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

		$criteria->compare('idqr_answer',$this->idqr_answer);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('idqr_question',$this->idqr_question);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('detail_check',$this->detail_check);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QrAnswer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
