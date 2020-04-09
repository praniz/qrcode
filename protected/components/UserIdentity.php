<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public function authenticate()
    {   
        $username = strtolower($this->username);
     
        $user = QrUser::model()->findByAttributes(array('username' => $username));
       
        if($user==null) 
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        else if($user->password !== $this->password) // !== Password
            $this->errorCode = self::ERROR_PASSWORD_INVALID;

        else  {
       // print_r($user);
        Yii::app()->user->authorize($user->idqr_user);

         return $this->errorCode = self::ERROR_NONE;
        } 

        return $this->errorCode;
   
    }
}