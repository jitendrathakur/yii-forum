<div class="<?php echo 'post question-block question_row_'.$data->id;?>">
	<div class="title ">
		
		<b>Question:</b>
		<?php echo $data->question_title; ?>
		<div class='pull-right'>
			<?php
			$checked = null;
			if ($data->active) {
				$checked = 'checked';
			}

			?>

			
			<?php echo CHtml::link('<i class="icon-eye-open"></i>',array('/question/'.$data->id)); ?>			
			<?php  if (Yii::app()->user->isGuest == false && $data->user_id == Yii::app()->user->id || User::model()->getGroupName() == 'Admin') : ?>
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
			<div class="question_status">

				<?php echo CHtml::CheckBox('active', $data->active, array(
					'id' => 'activeCheckbox_'.$data->id,
					'class' => 'activeQuestion',
					'question_id' => $data->id
					/*'ajax' => array(
	                    'url'=>$this->createUrl('/question/activated?id='.$data->id),
	                    //'data'=>'event_status_on=5',
	                    'type'=>'POST',
	                    'beforeSend' => 'js:function() {  
	                 
	                    }',
	                    'success'=>"js:function(resp) {

	                        if (resp == 1) {
	                        	$('#activeCheckbox_".$data->id."').attr('checked', 'checked');
	                        	$('#activeCheckbox_".$data->id."').siblings('p').remove();
	                        	$('#activeCheckbox_".$data->id."').before('<p class=\"success_ajax\">Activated</p>');
	                        } else {
	                        	$('#activeCheckbox_".$data->id."').removeAttr('checked');
	                        	$('#activeCheckbox_".$data->id."').siblings('p').remove();
	                        	$('#activeCheckbox_".$data->id."').before('<p class=\"failure_ajax\">Deactivated</p>');
	                        }

	                        return true;                                        
	                    }"
	                ),*/
	                    
	            )); ?>
        	</div>

		</div>

	</div>	
	
	<div class="">		
		<?php echo $data->description; ?>		
	</div>
	
</div>