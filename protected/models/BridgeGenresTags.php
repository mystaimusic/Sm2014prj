<?php

/**
 * This is the model class for table "bridge_genres_band".
 *
 * The followings are the available columns in table 'bridge_genres_band':
 * @property string $ID
 * @property string $GID
 * @property string $BID
 * @property double $PERCENTAGE
 *
 * The followings are the available model relations:
 * @property Bands $b
 * @property Genres $g
 */
class BridgeGenresBand extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bridge_genres_band';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GID, TID', 'required'),
			array('GID, TID', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, GID, TID', 'safe', 'on'=>'search'),
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
			'b' => array(self::BELONGS_TO, 'Bands', 'BID'),
			'g' => array(self::BELONGS_TO, 'Genres', 'GID'),
			't' => array(self::BELONGS_TO, 'Tags', 'TID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'GID' => 'Gid',
			'TID' => 'Tid',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('GID',$this->GID,true);
		$criteria->compare('TID',$this->TID,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BridgeGenresBand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
