<div class="<?php echo 'post question-block question_row_'.$data->id;?>">
	<div class="title ">
		
		<b>Question:</b>
		<?php echo $data->question_title; ?>
		<div class='pull-right'>
			<?php echo CHtml::link('<i class="icon-eye-open"></i>',array('/question/'.$data->id)); ?>
			<?php  if (Yii::app()->user->isGuest == false && $data->user_id == Yii::app()->user->id) : ?>
			<?php echo CHtml::link('<i class="icon-pencil"></i>',array('/question/edit/'.$data->id)); ?>
			<?php 
			echo CHtml::ajaxLink('<i class="icon-trash"></i>',
                Yii::app()->createUrl('/question/delete/'.$data->id),
                array(
                    'type'=>'post',
                    'data' => array('id' =>$data->id,'type'=>'delete'),
              
                    'success' => 'function(response) {
                  
                   		$(".question_row_'.$data->id.'").remove();
					}',
                ),
                array( 'confirm'=>'Are you sure to delete this question',)
			);

			endif;
			?>

		</div>

	</div>	
	
	<div class="">		
		<?php echo $data->description; ?>		
	</div>
	
</div>