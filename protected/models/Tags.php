<?php

/**
 * This is the model class for table "tags".
 *
 * The followings are the available columns in table 'tags':
 * @property string $TAGID
 * @property string $TAGNAME
 * @property string $DESCRIPTION
 * @property string $IMAGEPATH
 *
 * The followings are the available model relations:
 * @property BridgeTagsPl[] $bridgeTagsPls
 */
class Tags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TAGNAME', 'required'),
			array('TAGNAME, IMAGEPATH', 'length', 'max'=>64),
			array('DESCRIPTION', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TAGID, TAGNAME, DESCRIPTION, IMAGEPATH', 'safe', 'on'=>'search'),
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
			//'bridgeTagsPls' => array(self::HAS_MANY, 'BridgeTagsPl', 'TAGID'),
			'playlists' => array(self::MANY_MANY, 'Playlists', 'bridge_tags_pl(TAGID,PLID)'),
			'genres' => array(self::MANY_MANY, 'Genres', 'bridge_genres_tags(TID,GID)', 'limit'=>'5'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TAGID' => 'Tagid',
			'TAGNAME' => 'Tagname',
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
	
	/*public function getUrl()
	{
		return Yii::app()->createUrl('tags/view', array(
			'TAGID'=>$this->TAGID,
			'TAGNAME'=>$this->TAGNAME,
		));
	}*/

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

		//$criteria->compare('TAGID',$this->TAGID,true);
		$criteria->compare('TAGNAME',$this->TAGNAME,true);
		//$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		//$criteria->compare('IMAGEPATH',$this->IMAGEPATH,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
