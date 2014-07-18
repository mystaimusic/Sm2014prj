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
			array('genrename', 'required'),
			array('genrename, imagepath', 'length', 'max'=>64),
			array('description', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('genreid, genrename, description, imagepath', 'safe', 'on'=>'search'),
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
			//'bridgeGenresBands' => array(self::HAS_MANY, 'BridgeGenresBand', 'GID'),
			'tags' => array(self::MANY_MANY,'Tags', 'bridge_genres_tags(gid,tid)'),
			'bands' => array(self::MANY_MANY, 'Bands', 'bridge_genres_band(gid,bid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'genreid' => 'Genreid',
			'genrename' => 'Genrename',
			'description' => 'Description',
			'imagepath' => 'Imagepath',
			'meta_title' => 'MetaTitle',
			'meta_description' => 'MetaDescription',
			'meta_keywords' => 'MetaKeyword',
			'lang' => 'Lang',
			'insert_date' => 'InsertData',
			'featured' => 'Featured',
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

		$criteria->compare('genreid',$this->genreid,true);
		$criteria->compare('genrename',$this->genrename,true);
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
	 * @return Genres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
