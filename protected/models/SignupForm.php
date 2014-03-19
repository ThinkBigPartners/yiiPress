<?php

/**
 * SignupForm class.
 * SignupForm is the data structure for keeping
 * user signup form data. It is used by the 'signup' action of 'SiteController'.
 */
class SignupForm extends CFormModel {

    public $fullName;

    public $email;

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
                        'fullName, email, password, confirmPassword',
                        'required' 
                ),
                // rememberMe needs to be a boolean
                array (
                        'email',
                        'email' 
                ),
                array (
                        'confirmPassword',
                        'authenticate' 
                ),
                array (
                        'email, password',
                        'length',
                        'max' => 64 
                ),
                array (
                        'fullName',
                        'length',
                        'max' => 32 
                ),
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
                'email' => 'Email address',
                'fullName' => 'Full Name',
                'password' => 'Password',
                'confirmPassword' => 'Confirm Password',
        );
    }

    /**
     * sign up
     */
    public function signup() {
        $user = new User();
        
        $user->attributes = $this->attributes;
        $user->password = User::generateHash( $user->password );
        $user->createdAt = date( 'Y-m-d H:i:s' );
        if( $user->validate() ) {
            $user->save();
        }
        $this->addErrors($user->getErrors());
        
        $this->_identity = new TBUserIdentity( $user->email, $user->password );
    }
}
