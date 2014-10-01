<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=Usuario::model()->find("LOWER(usuario)=?",array(strtolower($this->username)));

		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(strtolower($this->password)!==(string)strtolower($user->Clave)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else
		{
			$criteriaRol = new CDbCriteria;
			$criteriaRol->with = array('moduloIdModulo');
			$criteriaRol->condition = 'Rol_idRol = '.$user->Rol_idRol;
			$modelModulo = ModuloRol::model()->findAll($criteriaRol);

			$Modulo = array();
			foreach ($modelModulo as $key => $value) {
				$Modulo[] = array(
					'idModulo'=>$value->moduloIdModulo->idModulo,
					'nombreModulo'=>$value->moduloIdModulo->NombreModulo,
					'url'=>$value->moduloIdModulo->Url
				);
			}

			$codigoVitrina = Vitrina::model()->find("Usuario_idUsuario = ".$user->idUsuario);
			$idVitrina = $codigoVitrina != null?$codigoVitrina->idVitrina:0;
			$numP = $codigoVitrina != null?$codigoVitrina->NumProductos:0;
			$EstVitrina = $codigoVitrina != null?$codigoVitrina->Estado:0;

			$this->setState("idVitrina",$idVitrina);
			$this->setState("NumProductos",$numP);
			$this->setState("EstadoVitrina",$numP);
			$this->setState("Nombre",$user->Nombre);
			$this->setState("Url",$user->Foto);
			$this->setState("Rol",$user->Rol_idRol);
			$this->setState("Modulos",$Modulo);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}