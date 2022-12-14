<?php
namespace Models;

require 'vendor/autoload.php';

use Models\Manager;

use Controllers\ControllerAccueil;
use Controllers\ControllerUser;
use Controllers\ControllerAdmin;

class MembersManager extends Manager
{

	//Insertion infos nouveau membre en db
	public function insertMembre($username, $mail, $password) 

	{
		$db = $this->dbConnect();
		$insertmbr = $db->prepare('INSERT INTO users (username, mail, password, droits) VALUES(?, ?, ?, 0)');
		$insertmbr->execute(array(
			$username,
			$mail,
			$password,   
		));
		return $insertmbr;

	}

	//Test pour contrer doublon mail
	public function testMail($mail) 

	{
		$db = $this->dbConnect();
		$reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
		$reqmail->execute(array(
			$mail
		));
		$mailexist = $reqmail->rowCount();
		return $mailexist;
	}
	
	//Connexion
	public function getConnect($username)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE username = ?');
		$req->execute(array($username));
		
		return $req->fetch();
	}







}