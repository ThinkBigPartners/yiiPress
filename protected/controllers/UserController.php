<?php
 
class UserController extends WordPressController
{
    public function actionIndex() {


    }

    public function actionSignup() {
        if( isset( Yii::app()->user->id ) ) {
            $this->redirect( '/' );
        }
                
        $model = new SignupForm();  
        
        // collect user input data
        if( isset( $_POST ['SignupForm'] ) ) {
            $model->attributes = $_POST ['SignupForm'];
            // validate user input and redirect to the previous page if valid
            if( $model->validate() ) {
                $model->signup();
                $loginModel = new LoginForm();
                $loginModel->email = $_POST ['SignupForm'] ['email'];
                $loginModel->password = $_POST ['SignupForm'] ['password'];
                if( $loginModel->validate() && $loginModel->login() ) {
                    $this->redirect( Yii::app()->user->returnUrl );
                }
            }
            print_r($model->getErrors());
        }
        // display the signup form
        $this->render( 'signup', array (
                'model' => $model 
        ) );
    }

    public function actionLogin() {
        if( isset( Yii::app()->user->id ) ) {
            $this->redirect( '/' );
        }
        
        $model = new LoginForm();
        
        // if it is ajax validation request
        if( isset( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form' ) {
            echo CActiveForm::validate( $model );
            Yii::app()->end();
        }
        
        // collect user input data
        if( isset( $_POST ['LoginForm'] ) ) {
            $model->attributes = $_POST ['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if( $model->validate() && $model->login() )
                $this->redirect( Yii::app()->user->returnUrl );
        }
        // display the login form
        $this->render( 'login', array (
                'model' => $model 
        ) );
    }

    public function actionUpdate() {

    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect( Yii::app()->homeUrl );
    }

}