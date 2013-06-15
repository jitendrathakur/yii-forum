<div id="header">
	<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
</div><!-- header -->
<div class="navbar navbar-fixed-top">
    	<div class="navbar-inner">
        	<div class="container-fluid">	    	

		        <a class="brand" href="#">Forum</a>
				<div id="mainmenu" class="nav-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/')),
							array('label'=>'About', 'url'=>array('/site/page/view/about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),							
							//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						), 'htmlOptions'=>array('class'=>'nav')
					)); ?>
				</div><!-- mainmenu -->
				<form class="navbar-search pull-left" action="">
		              <input type="text" class="search-query span4" placeholder="Search"/>
		        </form>

	            <ul class="nav pull-right">

	              <li class="dropdown">	             
	                <?php 
	                if (Yii::app()->user->isGuest) {
	                	echo CHtml::link('Login', array('/user/login/'));?>
	                </li>
	                <li> <?php
	      				echo CHtml::link('Signup', array('/user/register/'));
					} else {
						echo CHtml::link(Yii::app()->user->name.'<b class="caret"></b>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
						$this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
								//array('label'=>'Register', 'url'=>array('/site/register')),
								array('label'=>'', 'itemOptions' => array('class' => 'divider')),
								array('label'=>'MANAGE ACCOUNT', 'itemOptions' => array('class' => 'nav-header')),
								array('label'=>'Profile', 'url'=>array('/site/profile')),
								array('label'=>'Setting', 'url'=>array('/site/setting')),						
							), 'htmlOptions'=>array('class'=>'dropdown-menu')
						));
					}
					?>	        
	              </li>
	              <li class="divider-vertical"></li>             
	            </ul>
		    </div>
		</div>
	</div>
	
