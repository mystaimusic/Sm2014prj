<?php

/**
 * This is the model class for table "genres".
 *
 * The followings are the available columns in table 'genres':
 * @property string $GENREID
 * @property string $GENRENAME
 * @property string $DESCRIPTION
 * @property string $IMAGEPATH
 *
 * The followings are the available model relations:
 * @property BridgeGenresBand[] $bridgeGenresBands
 */
class Genres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'genres';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GENRENAME', 'required'),
			array('GENRENAME, IMAGEPATH', 'length', 'max'=>64),
			array('DESCRIPTION', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('GENREID, GENRENAME, DESCRIPTION, IMAGEPATH', 'safe', 'on'=>'search'),
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
			'bridgeGenresBands' => array(self::HAS_MANY, 'BridgeGenresBand', 'GID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'GENREID' => 'Genreid',
			'GENRENAME' => 'Genrename',
			'DESCRIPTION' => 'Description',
			'IMAGEPATH' => 'Imagepath',
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

		$criteria->compare('GENREID',$this->GENREID,true);
		$criteria->compare('GENRENAME',$this->GENRENAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('IMAGEPATH',$this->IMAGEPATH,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Genres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
