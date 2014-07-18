<?php

/**
 * This is the model class for table "bands".
 *
 * The followings are the available columns in table 'bands':
 * @property string $BANDID
 * @property string $BANDNAME
 * @property string $DESCRIPTION
 * @property string $IMAGEPATH
 *
 * The followings are the available model relations:
 * @property Songs $bAND
 * @property BridgeGenresBand[] $bridgeGenresBands
 */
class Bands extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bands';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bandname', 'required'),
			array('bandname', 'length', 'max'=>32),
			array('description, imagepath', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bandid, bandname, description, imagepath', 'safe', 'on'=>'search'),
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
			//'bAND' => array(self::BELONGS_TO, 'Songs', 'BANDID'),
			'band' => array(self::BELONGS_TO, 'Songs', 'bandid'),
			'bridgeGenresBands' => array(self::HAS_MANY, 'BridgeGenresBand', 'bid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bandid' => 'Bandid',
			'bandname' => 'Bandname',
			'description' => 'Description',
			'imagepath' => 'Imagepath',
			'meta_title' => 'MetaTitle',
			'meta_description' => 'MetaDescription',
			'meta_keywords' => 'MetaKeyword',
			'lang' => 'lang',
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

		$criteria->compare('bandid',$this->bandid,true);
		$criteria->compare('bandname',$this->bandname,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('imagepath',$this->imagepath,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bands the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
