<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Reset Password';
?>

<?php $this->beginClip('css'); ?>
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="/css/lib/jquery.infieldLabel.css" />
<?php $this->endClip(); ?>

<?php $this->beginClip('js'); ?>
    <script src="/js/lib/jquery.infieldlabel.js"></script>
<?php $this->endClip(); ?>

<div class="container">
    <div id="reset-password-content">
        <div class="col-sm-7 message">
            <h1>Reset your Password</h1>
            <div class="no-account"><a href="/signup">No account? Sign up for an account now &raquo;</a></div>
        </div>

        <div class="col-sm-5 form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'reset-password-form',
            )); ?>
                <div class="reset-password-field row">
                    <div class="col-md-4 reset-password-field-label">
                        <?php echo $form->labelEx($model,'password'); ?>:
                    </div>
                    <div class="col-md-8">
                        <?php echo $form->passwordField($model,'password', array('required' => 'required', 'class' => 'form-control reset-password-input')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
                </div>
                <div class="reset-password-field row">
                    <div class="col-md-4 reset-password-field-label">
                        <?php echo $form->labelEx($model,'confirmPassword'); ?>
                    </div>
                    <div class="col-md-8">
                        <?php echo $form->passwordField($model,'confirmPassword', array('required' => 'required', 'class' => 'form-control reset-password-input')); ?>
                        <?php echo $form->error($model,'confirmPassword'); ?>
                    </div>
                </div>
                <div class="row reset-password-field-field">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-block rr-btn-green">Reset Password</button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div>
</div>