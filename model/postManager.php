<?php

namespace Models;

require 'vendor/autoload.php';

use Controllers\ControllerAccueil;
use Controllers\ControllerUser;
use Controllers\ControllerAdmin;

class PostManager extends Manager
{

	//Insertion d'article (Admin)
	public function postArticle($idUser, $title, $chapo, $content) 
	{
		$db = $this->dbConnect();
		$inserArticle = $db->prepare('INSERT INTO posts (user_id, title, chapo, content, creation_date) VALUES (?, ?, ?, ?, NOW())');
        $article = $inserArticle->execute(array($idUser, $title, $chapo, $content));
		
		return $article;

	}

}