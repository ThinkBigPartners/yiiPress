<?php
$this->pageTitle=Yii::app()->name . ' - Sign Up';
?>

<div id="signup-page" class="page-bg">
	<div class="container">
		<div class="content">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'signup-form',
			    'action'=>'/signup'
			)); ?>
				<div class="row signup-top">
					<div class="col-md-8 signup-left">
						<h1>Sign up</h1>
						<div class="signup-field row">
							<div class="col-md-4 signup-field-label">
								<?php echo $form->labelEx($model,'fullName'); ?>:
							</div>
							<div class="col-md-8">
								<?php echo $form->textField($model,'fullName', array('required' => 'required', 'class' => 'form-control signup-name')); ?>
								<?php echo $form->error($model,'fullName'); ?>
							</div>
						</div>
						<div class="signup-field row">
							<div class="col-md-4 signup-field-label">
								<?php echo $form->labelEx($model,'email'); ?>:
							</div>
							<div class="col-md-8">
								<?php if(!empty($model->invitation_code)){
								        echo $form->textField($model,'email', array('required' => 'required', 'class' => 'form-control signup-email', 'readonly'=>'readonly'));
								    }else{
                                        echo $form->textField($model,'email', array('required' => 'required', 'class' => 'form-control signup-email')); 
                                    }?>
								<?php echo $form->error($model,'email'); ?>
							</div>
						</div>
						<div class="signup-field row">
							<div class="col-md-4 signup-field-label">
								<?php echo $form->labelEx($model,'password'); ?>:
							</div>
							<div class="col-md-8">
								<?php echo $form->passwordField($model,'password', array('required' => 'required', 'class' => 'form-control sign-password')); ?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>
						<div class="signup-field row">
							<div class="col-md-4 signup-field-label">
								<?php echo $form->labelEx($model,'confirmPassword'); ?>:
							</div>
							<div class="col-md-8">
								<?php echo $form->passwordField($model,'confirmPassword', array('required' => 'required', 'class' => 'form-control sign-password')); ?>
								<?php echo $form->error($model,'confirmPassword'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="signup-bottom">
					<div class="row">
						<div class="col-md-8">
						</div>
						<div class="col-md-4 signup-right">
							<button type="submit" id="signup-button" class="btn rr-btn-green">Finish</button>
						</div>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
