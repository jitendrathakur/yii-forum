<div class="form">
<?php echo CHtml::beginForm(); ?>
 

 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Username'); ?>
        <?php echo CHtml::activeTextField($model,'username', array()); ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Password'); ?>
        <?php echo CHtml::activePasswordField($model,'password', array()) ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Confirm Password'); ?>
        <?php echo CHtml::activePasswordField($model,'c_password', array()) ?>
    </div>
 
    <div class="row email">
        <?php echo CHtml::activeLabel($model,'Email'); ?>
        <?php echo CHtml::activeTextField($model,'email', array()); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-info')); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
    <?php echo CHtml::errorSummary($model); ?>
</div><!-- form -->