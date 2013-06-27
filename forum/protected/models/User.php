<?php 

class User extends CActiveRecord
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
		return '{{user}}';
	}

    /**
	 * The followings are the available columns in table 'user':
	 * @var integer $id
	 * @var string $username
	 * @var string $password	 
	 * @var string $c_password	 
	 * @var string $email
	 * @var string $profile	 
	 */

    public $c_password;

   
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, c_password', 'required', 'on'=>'insert'),			
            array('password, c_password', 'length', 'min'=>3, 'max'=>40),
            array('password', 'compare', 'compareAttribute'=>'c_password'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'       => 'Id',
			'username' => 'Username',
			'password' => 'Password',
			'c_password' => 'Confirm Password',
			'email'    => 'Email',
			'profile'  => 'Profile'	
		);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('user/register', array(
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
				$this->password = crypt($this->password);
				$this->group_id = 2;
				
				return true;
			}
			else
			
			return true;
		}
		else
			return false;
	}

	public function relations()
	{
	    return array(
	        'group' => array(self::BELONGS_TO, 'Group', 'group_id', 'together'=>false),
	    );
	}


	public function getGroupName() {

		if (Yii::app()->user->id) {

			$data = $this->findByPk(Yii::app()->user->id);

			return $data->group->name;
		} else {
			return;
		}
	

	}//end getGroupName()

	
}