<?php

/**
 * SignupForm class.
 * SignupForm is the data structure for keeping
 * user signup form data. It is used by the 'signup' action of 'SiteController'.
 */
class ForgotPasswordForm extends CFormModel {

    public $email;

    public $_identity;


    /**
     * Declares the validation rules. The rules state that username and password are required, and password needs to be authenticated.
     */
    public function rules() {
        return array (
                // username and password are required
                array (
                        'email',
                        'required' 
                ),
                // rememberMe needs to be a boolean
                array (
                        'email',
                        'email' 
                ),
                array (
                        'email',
                        'length',
                        'max' => 64 
                )
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array (
            'email' => 'Email Address',
        );
    }

    /**
     * forgot Password
     */
    public function forgotPassword() {
        $user = TBUser::model()->find("email=:email", array(":email" => strtolower($this->email)));

        return $user->sendForgotPasswordEmail();
    }
}
