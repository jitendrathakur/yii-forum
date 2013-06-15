<?php

class GroupController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$this->debug(Yii::app()->authManager->defaultRoles);

		
		$criteria=new CDbCriteria(array(
			//'condition' => 'active=1',
			'order' => 'created DESC',
			//'with'=>'commentCount',
		));
		//if(isset($_GET['tag']))
		//$criteria->addSearchCondition('active', 1);

		$dataProvider= new CActiveDataProvider('Group', array('pagination'=>array(
				//'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		//print_r($dataProvider);

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionCreate()
	{	

		$model = new Group;
		//$this->debug($_POST['Group']);
		if (isset($_POST['Group']))
		{
			$model->attributes = $_POST['Group'];
		   
			//$model->attributes = array('question_title' => 'hello', 'description' => 'hello world');
			//	print_r($_POST['Group']);
			//$this->debug($model->attributes );
			//$model->validate();
			//var_dump($model->getErrors());
			//$this->debug($model->save());
			//exit;
			if ($model->save())
				$this->redirect(array('view', 'id'=>$model->id));
		}
	
		$this->render('create',array(
			'model' => $model,
		));
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView($id = null)
	{
		//$model = new Group;
		//	$data = Group::model()->find('id=:Id', array(':Id'=>$id));
		$data=$this->loadModel();
		$criteria = new CDbCriteria;
		//$criteria->condition = 'active = 1 AND id = '.$id;
		$data = Group::model()->with(
			array(
				//'answers'=>array('together'=>false, 'condition' => 'answers.active = 1')
			))->find($criteria);

		//$this->debug($data);
		$model = new Answer;

		if (isset($_POST['Answer'])) {

			$model->attributes = $_POST['Answer'];
			$model->question_id = $id;
			
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
                $this->_model=Group::model()->findbyPk($_GET['id']);
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
		//$this->debug($_POST['Group']);
		if(isset($_POST['Group']))
		{
			$model->attributes = $_POST['Group'];
			//$model->attributes = array('question_title' => 'hello', 'description' => 'hello world');
			//	print_r($_POST['Group']);

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