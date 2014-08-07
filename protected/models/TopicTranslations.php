<?php

class TopicTranslations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'topic_translations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('id', 'required'),
				array('lang','required'),
				array('topic','required'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, lang, topic', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'Id',
				'title' => 'Title',
				'description' => 'Description',
				'lang' => 'Lang',
				'topic' => 'Topic',
				'meta_title' => 'MetaTitle',
				'meta_description' => 'MetaDescription',
				'meta_keywords' => 'MetaKeyword',
		);
	}
	
	public function primaryKey(){
		return array('id', 'lang','topic');
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('topic',$this->topic,true);

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
