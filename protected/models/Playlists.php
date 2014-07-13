<?php

/**
 * This is the model class for table "playlists".
 *
 * The followings are the available columns in table 'playlists':
 * @property string $PLID
 * @property string $PLREF
 * @property string $PLTITLE
 * @property string $DESCRIPTION
 * @property string $IMAGEPATH
 *
 * The followings are the available model relations:
 * @property BridgePlSongs[] $bridgePlSongs
 * @property BridgeTagsPl[] $bridgeTagsPls
 */
class Playlists extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'playlists';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PLREF, PLTITLE', 'required'),
			array('PLREF', 'length', 'max'=>32),
			array('PLTITLE, IMAGEPATH', 'length', 'max'=>64),
			array('DESCRIPTION', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PLID, PLREF, PLTITLE, DESCRIPTION, IMAGEPATH', 'safe', 'on'=>'search'),
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
			'bridgePlSongs' => array(self::HAS_MANY, 'BridgePlSongs', 'PLID'),
			'bridgeTagsPls' => array(self::HAS_MANY, 'BridgeTagsPl', 'PLID'),
			'songs' => array(self::MANY_MANY,'Songs', 'bridge_pl_songs(PLID,SONGID)'),
			'tags' => array(self::MANY_MANY, 'Tags', 'bridge_tags_pl(PLID,TAGID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PLID' => 'Plid',
			'PLREF' => 'Plref',
			'PLTITLE' => 'Pltitle',
			'DESCRIPTION' => 'Description',
			'IMAGEPATH' => 'Imagepath',
			'META_TITLE' => 'MetaTitle',
			'META_DESCRIPTION' => 'MetaDescription',
			'META_KEYWORDS' => 'MetaKeyword',
			'LANG' => 'Lang',
			'INSERT_DATE' => 'InsertData',
			'FEATURED' => 'Featured',
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

		$criteria->compare('PLID',$this->PLID,true);
		$criteria->compare('PLREF',$this->PLREF,true);
		$criteria->compare('PLTITLE',$this->PLTITLE,true);
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
	 * @return Playlists the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
