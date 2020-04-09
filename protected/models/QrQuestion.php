<?php

/**
 * This is the model class for table "qr_question".
 *
 * The followings are the available columns in table 'qr_question':
 * @property integer $idqr_question
 * @property string $title
 * @property integer $seq
 * @property integer $idqr_question_set
 * @property string $ans_type
 *
 * The followings are the available model relations:
 * @property QrAnswer[] $qrAnswers
 * @property QrQuestionSet $idqrQuestionSet
 */
class QrQuestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qr_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, idqr_question_set, ans_type', 'required'),
			array('seq, idqr_question_set', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('ans_type', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idqr_question, title, seq, idqr_question_set, ans_type', 'safe', 'on'=>'search'),
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
			'qrAnswers' => array(self::HAS_MANY, 'QrAnswer', 'idqr_question'),
			'idqrQuestionSet' => array(self::BELONGS_TO, 'QrQuestionSet', 'idqr_question_set'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idqr_question' => 'รหัส',
			'title' => 'คำถาม',
			'seq' => 'ลำดับที่แสดง',
			'idqr_question_set' => 'เลขที่อ้างอิง',
			'ans_type' => 'ชนิดของคำตอบ',
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

		$criteria->compare('idqr_question',$this->idqr_question);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('idqr_question_set',$this->idqr_question_set);
		$criteria->compare('ans_type',$this->ans_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QrQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
