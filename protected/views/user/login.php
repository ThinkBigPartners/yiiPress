<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php $this->beginClip('css'); ?>
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="/css/lib/jquery.infieldLabel.css" />
<?php $this->endClip(); ?>

<?php $this->beginClip('js'); ?>
    <script src="/js/lib/jquery.infieldlabel.js"></script>
<?php $this->endClip(); ?>

<div class="container">
    <div id="login-content">
        <div class="col-sm-7 message">
            <h1>Welcome back!</br>Log into your  account.</h1>
            <div class="no-account"><a href="/signup">No account? Sign up for an account now &raquo;</a></div>
        </div>

        <div class="col-sm-5 form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
            )); ?>
                <div class="login-field infield-label">
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textField($model,'email', array('required' => 'required', 'class' => 'form-control login-email')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>
                <div class="login-field infield-label">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password', array('required' => 'required', 'class' => 'form-control login-password')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>
                <div class="row login-field">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-block rr-btn-green">Log in</button>
                    </div>
                    <div class="col-md-6 col-sm-12 post-login">
                        <div class="checkbox">
                          <label for="LoginForm_rememberMe">
                            <?php echo $form->checkBox($model,'rememberMe'); ?>
                            Keep me signed in
                          </label>
                        </div>
                        <div class="forgot-password-container">
                            <a href="/forgot-password" class="green bold">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div>
</div>