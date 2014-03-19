<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
?>

<?php $this->beginClip('css'); ?>
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="/css/lib/jquery.infieldLabel.css" />
<?php $this->endClip(); ?>

<?php $this->beginClip('js'); ?>
    <script src="/js/lib/jquery.infieldlabel.js"></script>
<?php $this->endClip(); ?>

<div class="container">
    <div id="forgot-password-content">
        <div class="col-sm-7 message">
            <h1>Forgot your Password?</h1>
            <div class="no-account"><a href="/signup">No account? Sign up for an account now &raquo;</a></div>
        </div>

        <div class="col-sm-5 form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'forgot-password-form',
            )); ?>
                <div class="forgot-password-field row">
                    <div class="col-md-4 forgot-password-field-label">
                        <?php echo $form->labelEx($model,'email'); ?>
                    </div>
                    <div class="col-md-8">
                    <?php echo $form->textField($model,'email', array('required' => 'required', 'class' => 'form-control forgot-password-input')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                </div>
                <div class="row forgot-password-field-field">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-block rr-btn-green">Send Me Help</button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div>
</div>