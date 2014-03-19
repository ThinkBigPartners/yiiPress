<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class TBUserIdentity extends CUserIdentity {

    public $email;

    protected $_id;

    public function __construct($email = null, $password = null) {
        $this->email = $email;
        $this->username = $email;
        $this->password = $password;
    }

    /**
     * Authenticates a user. The example implementation makes sure if the username and password are both 'demo'. In practical applications, this should be changed to authenticate against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $record = User::model()->findByAttributes( array (
                'email' => $this->email 
        ) );
        if( $record === null )
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif( !User::verifyPassword( $this->password, $record->password ) )
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $record->id;
            $this->setState( 'admin', $record->admin );
            $this->setPersistentStates( array (
                    'fullName' => $record->fullName
            ) );
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    /**
     * (non-PHPdoc)
     *
     * @see CUserIdentity::getId()
     */
    public function getId() {
        return $this->_id;
    }

}