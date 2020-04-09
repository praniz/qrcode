<?php 
class WebUser extends CWebUser {
public function authorize($idUser) {
$user = QrUser::model()->findByPk($idUser);
$pVal = $user->privilege;

if ($pVal == "admin") $this->setState('isRule','1');
else if ($pVal == "user") $this->setState('isRule','2');
else $this->setState('isRule','3');

$this->setState('idqr_user',$idUser);
}
/*public function setIdUser($key,$value)
{$this->$key = $value;}
public function getIdUser($value)
{ return $value;}*/
}

