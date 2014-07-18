<?php

/**
 * This is the model class for table "bridge_pl_songs".
 *
 * The followings are the available columns in table 'bridge_pl_songs':
 * @property string $PSID
 * @property string $PLID
 * @property string $SONGID
 *
 * The followings are the available model relations:
 * @property Playlists $pL
 * @property Songs $sONG
 */
class BridgePlSongs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bridge_pl_songs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plid, songid', 'required'),
			array('plid', 'length', 'max'=>11),
			array('songid', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('psid, plid, songid', 'safe', 'on'=>'search'),
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
			'pL' => array(self::BELONGS_TO, 'Playlists', 'plid'),
			'sONG' => array(self::BELONGS_TO, 'Songs', 'songid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'psid' => 'Psid',
			'plid' => 'Plid',
			'songid' => 'Songid',
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

		$criteria->compare('psid',$this->psid,true);
		$criteria->compare('plid',$this->plid,true);
		$criteria->compare('songid',$this->songid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BridgePlSongs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
