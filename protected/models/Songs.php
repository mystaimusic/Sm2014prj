<?php

/**
 * This is the model class for table "songs".
 *
 * The followings are the available columns in table 'songs':
 * @property string $SONGID
 * @property string $WEBSITE
 * @property string $BANDID
 * @property string $CODE
 * @property string $TITLE
 * @property string $DESCRIPTION
 *
 * The followings are the available model relations:
 * @property Bands $bands
 * @property BridgePlSongs[] $bridgePlSongs
 */
class Songs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'songs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BANDID, CODE, TITLE', 'required'),
			array('WEBSITE', 'length', 'max'=>16),
			array('BANDID', 'length', 'max'=>10),
			array('CODE', 'length', 'max'=>32),
			array('TITLE', 'length', 'max'=>64),
			array('DESCRIPTION', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SONGID, WEBSITE, BANDID, CODE, TITLE, DESCRIPTION', 'safe', 'on'=>'search'),
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
			'bands' => array(self::HAS_ONE, 'Bands', 'BANDID'),
			'bridgePlSongs' => array(self::HAS_MANY, 'BridgePlSongs', 'SONGID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SONGID' => 'Songid',
			'WEBSITE' => 'Website',
			'BANDID' => 'Bandid',
			'CODE' => 'Code',
			'TITLE' => 'Title',
			'DESCRIPTION' => 'Description',
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

		$criteria->compare('SONGID',$this->SONGID,true);
		$criteria->compare('WEBSITE',$this->WEBSITE,true);
		$criteria->compare('BANDID',$this->BANDID,true);
		$criteria->compare('CODE',$this->CODE,true);
		$criteria->compare('TITLE',$this->TITLE,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Songs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
