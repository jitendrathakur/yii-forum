

<div class="form question-block">
	<div class="post highlight">
		<div class="title">
			<h1>Question:
			<?php echo $data->question_title; ?>
            </h1>
		</div>	
		
		<div class="">
	        <b>Brief:</b>
			<?php echo $data->description; ?>
		
		</div>
	</div>

</div><!-- form -->
<?php foreach ($data->answers as $answer) { ?>
    <div class="form code-block">
        <div class="post highlight">
            <div class="title">
                <b>Answer:</b>
                <?php echo $answer->answer; ?>
            </div>  
            
            <div class="nav">              
                    <?php $answer->rate; ?>              
            </div>
        </div>

    </div><!-- form -->

 <?php } ?>

<div class="well">
    <?php echo CHtml::beginForm(); ?>
     
        <?php echo CHtml::errorSummary($model); ?>
     
        <div class="">
            <?php echo CHtml::activeLabel($model,'Your Answer'); ?>
            <?php echo CHtml::activeTextarea($model,'answer', array('class' => 'span7 text-box')); ?>
        </div>
     
        <div class="">
            <?php echo CHtml::activeLabel($model,'rate'); ?>
            <?php
            $list = range(-5, 5);
            echo CHtml::dropDownList('Answer[rate]', $model, $list, array('options' => array('5'=>array('selected'=>true))));
            ?>
        </div> 
     
        <div class="submit">
            <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-info')); ?>
        </div>
     
    <?php echo CHtml::endForm(); ?>


</div>

