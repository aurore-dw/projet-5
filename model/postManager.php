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

	//Récupération de tous les chapitres rangés en ordre d'id descendante
	public function getArticlesAdmin() 
	{
		
		$db = $this->dbConnect();
		$articles = $db->query('SELECT * FROM posts ORDER BY post_id DESC');

		return $articles;
	}

	//Recupère un article par son id (Admin)
	public function getArticle($dataId)
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('SELECT * FROM posts WHERE post_id = ?');
		$req->execute(array($dataId));
	
    	return $req;
	}

	//Modifie un article (Admin)
	public function updateArticle($title, $chapo, $content, $postId) 
	{
		$db = $this->dbConnect();
		$updArt = $db->prepare('UPDATE posts SET title = ?, chapo = ?, content = ?, creation_date = NOW() WHERE post_id = ?');
        $artOk = $updArt->execute(array($title, $chapo, $content, $postId));
        	
		return $artOk;
	}

	//Supprime un article et ses commentaires (Admin)
	public function deletArticle($dataId) 
	{ 
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comments WHERE comment_id = ?');
        $comment->execute([$dataId]);
        $req = $db->prepare('DELETE FROM posts WHERE post_id = ?');
        $req->execute(array($dataId));
       	
    }

	//Reccupère tous les articles pour les afficher dans la vue (User)
	public function getAllArticles()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id ORDER BY creation_date DESC LIMIT 0, 50');

		return $req;

	}

}