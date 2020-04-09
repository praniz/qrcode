<?php

/**
 * This is the model class for table "tb_product".
 *
 * The followings are the available columns in table 'tb_product':
 * @property integer $id_product
 * @property string $name_product
 * @property string $barcode_product
 * @property string $detail_product
 * @property string $pic1
 * @property string $pic2
 * @property string $pic3
 * @property string $price
 * @property integer $id_type
 * @property integer $id_color
 * @property integer $id_size
 *
 * The followings are the available model relations:
 * @property TbColor $idColor
 * @property TbSize $idSize
 * @property TbType $idType
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_type, id_color, id_size', 'required'),
			array('id_type, id_color, id_size', 'numerical', 'integerOnly'=>true),
			array('name_product, barcode_product, pic1, pic2, pic3', 'length', 'max'=>45),
			array('detail_product', 'length', 'max'=>100),
			array('price', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_product, name_product, barcode_product, detail_product, pic1, pic2, pic3, price, id_type, id_color, id_size', 'safe', 'on'=>'search'),
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
			'idColor' => array(self::BELONGS_TO, 'Color', 'id_color'),
			'idSize' => array(self::BELONGS_TO, 'Size', 'id_size'),
			'idType' => array(self::BELONGS_TO, 'TbType', 'id_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id Product',
			'name_product' => 'Name Product',
			'barcode_product' => 'Barcode Product',
			'detail_product' => 'Detail Product',
			'pic1' => 'Pic1',
			'pic2' => 'Pic2',
			'pic3' => 'Pic3',
			'price' => 'Price',
			'id_type' => 'Id Type',
			'id_color' => 'Id Color',
			'id_size' => 'Id Size',
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

		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('name_product',$this->name_product,true);
		$criteria->compare('barcode_product',$this->barcode_product,true);
		$criteria->compare('detail_product',$this->detail_product,true);
		$criteria->compare('pic1',$this->pic1,true);
		$criteria->compare('pic2',$this->pic2,true);
		$criteria->compare('pic3',$this->pic3,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('id_color',$this->id_color);
		$criteria->compare('id_size',$this->id_size);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
