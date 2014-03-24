<?php

/**
 * SignupForm class.
 * SignupForm is the data structure for keeping
 * user signup form data. It is used by the 'signup' action of 'SiteController'.
 */
class ResetPasswordForm extends CFormModel {

    public $userId;

    public $forgotPasswordToken;

    public $password;

    public $confirmPassword;

    public $_identity;


    /**
     * Declares the validation rules. The rules state that username and password are required, and password needs to be authenticated.
     */
    public function rules() {
        return array (
                // username and password are required
                array (
                        'userId, forgotPasswordToken, password, confirmPassword',
                        'required' 
                ),
                array (
                        'confirmPassword',
                        'authenticate' 
                ),
                array (
                        'password',
                        'length',
                        'max' => 64 
                )
        );
    }

    /**
     * Authenticates the password. This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if( $this->password != $this->confirmPassword )
            $this->addError( 'confirmPassword', 'Password are not same.' );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array (
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        );
    }

    /**
     * reset Password
     */
    public function resetPassword() {
        $user = TBUser::model()->findByPk($this->userId);

        if ($user->forgotPasswordAuthenticate($this->forgotPasswordToken)) {
            $user->password = TBUser::generateHash($this->password);
            $user->forgotPasswordToken = TBUser::generateToken();
            $user->save();

            $identity = new TBUserIdentity( $user->email, $user->password );
            $identity->authenticate();

            Yii::app()->user->login( $identity, (60*60*24*7) );
            return true;
        }
        else {
            return false;
        }
    }
}
