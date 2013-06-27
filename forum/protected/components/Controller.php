<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	protected function debug($var){
        $bt = debug_backtrace();
        $dump = new CVarDumper();
        $debug = '<div style="display:block;background-color:gold;border-radius:10px;border:solid 1px brown;padding:10px;z-index:10000;"><pre>';
        $debug .= '<h4>function: '.$bt[1]['function'].'() line('.$bt[0]['line'].')'.'</h4>';
        $debug .=  $dump->dumpAsString($var);
        $debug .= "</pre></div>\n";
        Yii::app()->params['debugContent'] .=$debug;
    }


    protected function isGrantAccess($params = array()) {

    	$access = array();
    	$anonymous = true;
		
		foreach ($params as $role => $action) {

			if (User::model()->getGroupName() == $role) {
				$action = array_merge($action, $params['Anonymous']);
				$access = array(
					array(
					 	'allow',  // allow all users to access 'index' and 'view' actions.
						'actions' => $action,
						'users' => array('@'),
						//'expression' => "$groupId === 1"
					),
					array('deny')
				);
				$anonymous = false;			
			} 
		}

		if ($anonymous) {
			$access = array(
				array(
					'allow',
					'actions' => $params['Anonymous'],
					'users'=>array('*')
				),
				array('deny')
			);
		}			
	
		return $access;

    }//end isGrantAccess()  

	
}