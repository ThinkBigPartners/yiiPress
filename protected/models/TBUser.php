<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $fullName
 * @property string $createdAt
 * @property string $updatedAt
 * @property string $apiToken
 * @property string $forgotPasswordToken
 * @property integer $admin
 *
 */

class TBUser extends CActiveRecord {

    public $apiAuthError;
    public $authError;

    const ERROR_NONE=0;
    const ERROR_USERNAME_INVALID=1;
    const ERROR_PASSWORD_INVALID=2;
    const ERROR_UNKNOWN_IDENTITY=100;
   
    /**
     *
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     *
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array (
                array (
                        'email, password, fullName, apiToken, forgotPasswordToken',
                        'required' 
                ),
                array (
                        'email, password, apiToken, forgotPasswordToken',
                        'length',
                        'max' => 64 
                ),
                array (
                        'email',
                        'unique' 
                ),
                array (
                        'fullName',
                        'length',
                        'max' => 32 
                ),
                array (
                        'email',
                        'email' 
                ),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array (
                        'id, email, password, fullName, createdAt, updatedAt, admin, apiToken, forgotPasswordToken',
                        'safe',
                        'on' => 'search' 
                ) 
        );
    }

    /**
     *
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array (
        );
    }

    /**
     *
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array (
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'fullName' => 'Full Name',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'admin' => 'Admin',
            'forgotPasswordToken' => 'forgotPasswordToken',
            'apiToken' => 'API Token');
    }

    /**
     * hash password
     * @param origin $password
     * @return hashedPassword
     */
    public static function generateHash($password) {
        if( defined( "CRYPT_BLOWFISH" ) && CRYPT_BLOWFISH ) {
            $salt = '$2y$11$' + substr( md5( uniqid( rand(), true ) ), 0, 22 );
            return crypt( $password, $salt );
        }
    }

    /**
     * check password
     * @param origin $password
     * @param $hashedPassword
     * @return boolean
     */
    public static function verifyPassword($password, $hashedPassword) {
        return crypt( $password, $hashedPassword ) == $hashedPassword;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions. Typical usecase: - Initialize the model fields with values from filter form. - Execute this method to get CActiveDataProvider instance which will filter models according to data in model fields. - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria();
        
        $criteria->compare( 'ID', $this->ID );
        $criteria->compare( 'email', $this->email, true );
        $criteria->compare( 'password', $this->password, true );
        $criteria->compare( 'fullName', $this->full_name, true );
        $criteria->compare( 'createdAt', $this->created_at, true );
        $criteria->compare( 'updatedAt', $this->updated_at, true );
        $criteria->compare( 'admin', $this->admin );
        $criteria->compare( 'investor', $this->user_type, true );
        
        return new CActiveDataProvider( $this, array (
                'criteria' => $criteria 
        ) );
    }

    /**
     * Returns the static model of the specified AR class. Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model( $className );
    }

    /**
     * set up created_at and email before save
     */
    public function beforeSave() {
        if( parent::beforeSave() ) {
            $this->createdAt = date( "Y-m-d H:i:s" );
            $this->email = strtolower( $this->email );
            return true;
        }
        return false;
    }

    public function beforeValidate() {
        if( parent::beforeValidate() ) {
            if (!$this->createdAt) {
                $this->createdAt = date( "Y-m-d H:i:s" );
            }
            if (!$this->id) {
                $this->id = UUID::v4();
            }
            if (!$this->apiToken) {
                $this->generateApiToken();
            }
            if (!$this->forgotPasswordToken) {
                $this->generateForgotPasswordToken();
            }
            $this->email = strtolower( $this->email );
            return true;
        }
        return false;
    }

    public function getAPIAttributes() {
        $userAttributes = $this->attributes;
        unset($userAttributes['password']);
        unset($userAttributes['forgotPasswordToken']);
        return $userAttributes;
    }

    public function apiAuthenticate($apiToken) {
        if( $this->apiToken !== $apiToken )
            $this->apiAuthError = self::ERROR_PASSWORD_INVALID;
        else {
            $this->apiAuthError = self::ERROR_NONE;
        }
        return !$this->apiAuthError;
    }

    public function authenticate($password) {
        if (!User::verifyPassword($password, $this->password)) {
            $this->authError = self::ERROR_PASSWORD_INVALID;
        }
        else {
            $this->authError = self::ERROR_NONE;
        }
        return !$this->authError;
    }

    public function generateForgotPasswordToken() {
        $this->forgotPasswordToken = TBUser::generateToken();
    }

    public function generateApiToken() {
        $this->apiToken = TBUser::generateToken();
    }

    public static function generateToken() {
        $uuid = UUID::v4();
        $hmac = hash_hmac('sha256', $hmac, Yii::app()->params['apiSecret']);
        return base64_encode($uuid);
    }

    public function sendForgotPasswordEmail() {

        $mandrill = new Mandrill('sl_DRpyMpBELLq0ECOUCRw');

        $link = $this->generateForgotPasswordLink();

        $message = array(
            'text' => 'Click this link to reset your password.' . "\n\n" . $link,
            'subject' => 'Reset your password',
            'from_email' => Yii::app()->params['email_from_email'],
            'from_name' => Yii::app()->params['email_from_name'],
            'to' => array(
                array(
                    'email' => $this->email,
                    'name' => $this->fullName,
                    'type' => 'to'
                )
            ),
            'tags' => array('password-resets'),
            'recipient_metadata' => array(
                array(
                    'rcpt' => $this->email,
                    'values' => array('user_id' => $this->id)
                )
            )
        );

        $result = $mandrill->messages->send($message);

        return $result;

    }

    public function generateForgotPasswordLink() {
        if (!$this->forgotPasswordToken) {
            $this->forgotPasswordToken = TBUser::generateToken();
            $this->save();
        }

        return Yii::app()->createAbsoluteUrl('reset-password',array('id'=>$this->id, 'token' => $this->forgotPasswordToken));
    }
    
    /**
     * update password by userId
     */
    public static function updatePasswordById($userId, $newPassword) {
        User::model()->updateByPk( $userId, array (
                'password' => User::generateHash( $newPassword ) 
        ), array () );
    }

    /**
     * update password by email
     */
    public static function updatePasswordByEmail($email, $newPassword) {
        $temp = User::model()->updateAll( array (
                'password' => User::generateHash( $newPassword ) 
        ), 'email=:email', array (
                'email' => $email 
        ) );
    }

    /**
     * whether email is exist
     */
    public static function doesEmailExist($email) {
        $usersArray = User::model()->findAll( 'email=:email', array (
                'email' => $email 
        ) );
        return sizeof( $usersArray ) > 0;
    }
}
