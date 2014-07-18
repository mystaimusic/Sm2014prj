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
class LabelsTable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'labels_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('label_key', 'required'),
			array('label_key', 'length', 'max'=>32),
			array('label', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category, label, label_key, language', 'safe', 'on'=>'search'),
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
			
		);
	}

	//public function primaryKey()
	//{
	//	return array('LABEL_KEY','LANGUAGE');
	//}
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category' => 'Category',
			'label' => 'Label',
			'label_key' => 'Label_key',
			'language'=> 'Language',
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

		$criteria->compare('category',$this->category,true);
		$criteria->compare('label_key',$this->label_key,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('language',$this->language,true);

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
