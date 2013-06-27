<?php

class QuestionController extends Controller 
{
   // public $layout='column2';

    /**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{

		/*$access = array();
		$groupId = null;

		if (isset(Yii::app()->user->group_id)) {
		  	$groupId = Yii::app()->user->group_id;	
		}
		
		if (User::model()->getGroupName() == 'Admin') {
			$access = array(
				array(
				 	'allow',  // allow all users to access 'index' and 'view' actions.
					'actions' => array('add'),
					'users'=>array('@'),
					'expression' => "$groupId === 1"
				),
				array('deny')
			);

		} else if (User::model()->getGroupName() == 'User') {
			
			$access = array(
				array(
				 	'allow',  // allow all users to access 'index' and 'view' actions.
					'actions' => array('index','view', 'edit', 'delete', 'add'),
					'users'=>array('@'),
					'expression' => "$groupId === 2"
				),
				array('deny')
			);

		} else {
			$access = array(
				array(
					'allow',
					'actions' => array('index', 'add', 'view'),
					'users'=>array('*')
				),
				array('deny')
			);
		}*/

		$params = array(
			'Admin' => array('add', 'edit', 'delete', 'admin_index', 'activated'),
			'User'  => array('add', 'edit', 'delete'),
			'Anonymous' => array('index', 'view', 'add')
		);

		return $this->isGrantAccess($params);
	
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$criteria=new CDbCriteria(array(
			'condition' => 'active = 1',
			'order' => 'created DESC',
			//'with'=>'commentCount',
		));
		//if(isset($_GET['tag']))
		//$criteria->addSearchCondition('active', 1);

		$dataProvider= new CActiveDataProvider('Question', array(
			'pagination'=>array(
							'pageSize' => 8
				//'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		
		//$this->debug(User::model()->getGroupName());

		//$this->debug(Yii::app()->user->group_id);

		$this->render('index', array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionAdd()
	{	

		$model = new Question;		
		if (isset($_POST['Question']))
		{

			$model->attributes = $_POST['Question'];             
			if ($model->validate()) {				
			    if (Yii::app()->user->isGuest) {
			  		$model->active = 0;
			  		Yii::app()->user->setFlash('block', "Your question is on under supervision!");
			  		$redirect = array('index');		  		
			    } else {
			  		$model->active = 1;
			  		$model->user_id = Yii::app()->user->id;
			  		$redirect = array('view', 'id' => $model->id);
			    }
				//$model->attributes = array('question_title' => 'hello', 'description' => 'hello world');
				//	print_r($_POST['Question']);
				//$this->debug($model->attributes );
				//$model->validate();
				//var_dump($model->getErrors());
				//$this->debug($model->save());
				//exit;
				if ($model->save())
					$this->redirect($redirect);
			}			
		}
	
		$this->render('add',array(
			'model' => $model,
		));
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView($id = null)
	{
		//$model = new Question;
		//	$data = Question::model()->find('id=:Id', array(':Id'=>$id));
		$data=$this->loadModel();
		$criteria = new CDbCriteria;
		$criteria->condition = 'active = 1 AND id = '.$id;
		$data = Question::model()->with(
			array(
				'answers'=>array('together'=>false, 'condition' => 'answers.active = 1')
			))->find($criteria);

		//$this->debug($data);
		if (empty($data)) {
			$this->redirect(array('index'));
		}
		//exit;
		$model = new Answer;

		if (isset($_POST['Answer'])) {

			$model->attributes = $_POST['Answer'];
			$model->question_id = $id;
			if (Yii::app()->user->isGuest) {
		  		$model->active = 0;
		  		Yii::app()->user->setFlash('block', "Your answer is on under supervision!");
		    } else {
		  		$model->active = 1;
		  		$model->user_id = Yii::app()->user->id;
		  		
		    }
			if ($model->save())
				$this->redirect(array('view', 'id'=>$id));
           // echo "hi";
           // exit;
		}

		//$question = $this->$model->findById($id);
		//$this->debug($data);
		//exit;

		$this->render('view',array(
			'model' => $model,
			'data' => $data,
		));
	}

	public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Question::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }


	/**
	 * Lists all models.
	 */
	public function actionEdit($id = null)
	{	

		$model=$this->loadModel();
		//$this->debug($_POST['Question']);
		if(isset($_POST['Question']))
		{
			$model->attributes = $_POST['Question'];
			//$model->attributes = array('question_title' => 'hello', 'description' => 'hello world');
			//	print_r($_POST['Question']);

			//$this->debug($model->attributes );
			//$model->validate();
			//var_dump($model->getErrors());
			//$this->debug($model->save());
			//exit;
			if ($model->save())
				$this->redirect(array('view', 'id'=>$model->id));
		}
	
		$this->render('edit', array(
			'model' => $model,
			//'data'  => $data
		));
	}// end edit


	/**
	 * Lists all models.
	 */
	public function actionDelete($id = null)
	{	

	 	if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            echo "success";
            
           // if(isset($_POST['type']))
                    //$this->redirect(array('/question/'));
    
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
           // if(!isset($_GET['ajax']))
                   // $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
                
	}// end delete


	/**
	 * Lists all models.
	 */
	public function actionAdmin_Index()
	{
		
		$criteria=new CDbCriteria(array(
			//'condition' => 'active = 1',
			'order' => 'active ASC',
			//'with'=>'commentCount',
		));
		//if(isset($_GET['tag']))
		//$criteria->addSearchCondition('active', 1);

		$dataProvider= new CActiveDataProvider('Question', array(
			'pagination'=>array(
				'pageSize' => 8
				//'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		
		//$this->debug(User::model()->getGroupName());

		//$this->debug(Yii::app()->user->group_id);
		
		$model = new Question;

		$this->render('admin_index', array(
			'dataProvider'=>$dataProvider,
			'model' => $model
		));
	}


	public function actionActivated($id = null) {

		$model=$this->loadModel();
       
        if ($model->attributes['active']) {
        	$flag = 0;
        } else {
        	$flag = 1;
        }
		$model->active = $flag;
		$model->save();

		echo json_encode($flag);
		
	}


}//end class