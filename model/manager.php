<?php

namespace Models;

require 'vendor/autoload.php';

use Controllers\ControllerAccueil;
use Controllers\ControllerUser;
use Controllers\ControllerAdmin;

class Manager

{
	//Connexion a la base de donnée
	protected function dbConnect()

	{
		try
		{
			$db = new \PDO('mysql:host=localhost;dbname=projet5-php;charset=utf8', 'root', ''); //Localhost
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		
			return $db;
		}
		catch(Exception $e)
		{
        	die('Erreur : '.$e->getMessage());
		}

	}

}