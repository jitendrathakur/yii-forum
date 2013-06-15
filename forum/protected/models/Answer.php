<?php 

class Answer extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{answers}}';
	}

    /**
	 * The followings are the available columns in table 'questions':
	 * @var integer $id
	 * @var string $answer
	 * @var string $rate	 
	 * @var integer $created
	 * @var integer $modified
	 * @var integer $user_id
	 */


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer', 'required'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'answer' => 'Answer',
			'rate' => 'Rate',
			'user_id' => 'User',
			'created' => 'Created',
			'modified' => 'Modified'
		);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('answer/view', array(
			'id'=>$this->id,
			//'title'=>$this->title,
		));
	}
	



	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->created = $this->modified = date('Y-m-d H:i:s');
				$this->user_id=1;
				return true;
			}
			else
			//	$this->update_time=time();
			return true;
		}
		else
			return false;
	}

	
}