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
			array('plref, pltitle', 'required'),
			array('plref', 'length', 'max'=>32),
			array('pltitle, imagepath', 'length', 'max'=>64),
			array('description', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('plid, plref, pltitle, description, imagepath', 'safe', 'on'=>'search'),
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
			'bridgePlSongs' => array(self::HAS_MANY, 'BridgePlSongs', 'plid'),
			'bridgeTagsPls' => array(self::HAS_MANY, 'BridgeTagsPl', 'plid'),
			'songs' => array(self::MANY_MANY,'Songs', 'bridge_pl_songs(plid,songid)'),
			'tags' => array(self::MANY_MANY, 'Tags', 'bridge_tags_pl(plid,tagid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'plid' => 'Plid',
			'plref' => 'Plref',
			'pltitle' => 'Pltitle',
			'description' => 'Description',
			'imagepath' => 'Imagepath',
			'meta_title' => 'MetaTitle',
			'meta_description' => 'MetaDescription',
			'meta_keyword' => 'MetaKeyword',
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

		$criteria->compare('plid',$this->plid,true);
		$criteria->compare('plref',$this->plref,true);
		$criteria->compare('pltitle',$this->pltitle,true);
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
	 * @return Playlists the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
