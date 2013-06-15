<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'question tilte'); ?>
        <?php echo CHtml::activeTextField($model,'question_title', array('class' => 'span4')); ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'description'); ?>
        <?php echo CHtml::activeTextarea($model,'description', array('rows' => '4', 'class' => 'span6 text-box')) ?>
    </div>
 
    <div class="row rememberMe">
        <?php //echo CHtml::activeCheckBox($model,'rememberMe'); ?>
        <?php //echo CHtml::activeLabel($model,'rememberMe'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-info')); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->