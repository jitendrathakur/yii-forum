<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="description" content="forum">
    <meta name="author" content="Jitendra Thakur">

	<!-- blueprint CSS framework 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/inconsolata.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/highlight.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-te-1.3.5.css"> 
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-te-1.3.5.min.js"></script>
    

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container1" id="page">	

	<?php $this->renderPartial('/partial/_header', array());?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
 
	<div class="alert-success alert">
	    <?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
	 
	<?php endif; ?>

	

	<div class="container-fluid">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	     <div class="row-fluid">
	        <div class="span3">
	          <div class="well sidebar-nav">
	            <ul class="nav nav-list">
	              <li class="nav-header">Index</li>
	              <li>
	              <?php echo CHtml::link('<i class="icon-plus"></i>Post Question',array('/question/add/')); ?>	           	
	              </li>
	              <li>
	              	<?php echo CHtml::link('<i class="icon-plus"></i>Top Question',array('/question/')); ?>
	              </li>
	              <li><a href="#">Director</a></li>
	              <li><a href="#">Plates</a></li>
	              <li><a href="#">Resourceful</a></li>
	              <li class="active"><a href="#">Union</a></li>
	              <li><a href="#">Winston</a></li>
	              <li class="nav-header">Subnav</a></li>
	              <li><a href="#">Initialization</a></li>
	              <li class="active"><a href="#">Writing middleware</a></li>
	              <li><a href="#">Error handling</a></li>
	              <li><a href="#">Connect compatibility</a></li>
	            </ul>
	          </div>
	        </div>
	      <div class="span1">&nbsp;</div>

        <div class="span7">
          <div class="row-fluid">
            <div class="span12 document">
              <?php echo $content; ?>
            </div>
          </div>
        </div>	
    </div>

	<div class="clear"></div>

	<div id="footer">
		 <footer>
        Copyright &copy; 2012, Jitendra Thakur
      </footer>
	</div><!-- footer -->

</div><!-- page -->
<?php if(!empty(Yii::app()->params['debugContent'])):?>
                <?php echo Yii::app()->params['debugContent'];?>
<?php endif;?>
<script>

    if ($('.text-box').length != 0) {
	  $('.text-box').jqte();
	}
  
</script>
</body>
</html>
