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
class User extends TBUser {
   
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
                        'email',
                        'unique' 
                ),
                array (
                        'email, password, apiToken, forgotPasswordToken',
                        'length',
                        'max' => 64 
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
            'apiToken' => 'API Token',
            'forgotPasswordToken' => 'Forgot Password Token');
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
    
}
