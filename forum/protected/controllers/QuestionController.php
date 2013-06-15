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
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view', 'add', 'edit', 'delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$criteria=new CDbCriteria(array(
			'condition' => 'active=1',
			'order' => 'created DESC',
			//'with'=>'commentCount',
		));
		//if(isset($_GET['tag']))
		//$criteria->addSearchCondition('active', 1);

		$dataProvider= new CActiveDataProvider('Question', array(
			'pagination'=>array(
				//'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->debug($dataProvider);

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionAdd()
	{	

		$model = new Question;
		//$this->debug($_POST['Question']);
		if (isset($_POST['Question']))
		{
			$model->attributes = $_POST['Question'];
		    if (Yii::app()->user->isGuest) {
		  		$model->active = 0;
		    } else {
		  		$model->active = 1;
		  		$model->user_id = Yii::app()->user->id;
		    }
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
		$model = new Answer;

		if (isset($_POST['Answer'])) {

			$model->attributes = $_POST['Answer'];
			$model->question_id = $id;
			if (Yii::app()->user->isGuest) {
		  		$model->active = 0;
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


}