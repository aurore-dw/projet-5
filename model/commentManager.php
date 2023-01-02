<?php

namespace Models;

require 'vendor/autoload.php';

use Controllers\ControllerAccueil;
use Controllers\ControllerUser;
use Controllers\ControllerAdmin;

class CommentManager extends Manager
{
	//Reccuperation des commentaires selon l'id de l'article avec jointure pour réccuperer le pseudo 
	public function getComments($id)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT comments.comment_id, users.username, comments.comment, comments.moderation, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date FROM comments INNER JOIN users ON comments.author = users.user_id WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($_GET['id']));

		return $comments;
	}

	//Ajout de commentaire
	public function postComment($idArticle, $author, $comment)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date, moderation) VALUES(?, ?, ?, NOW(), 1)');
    	$affectedLines = $comments->execute(array($idArticle, $author, $comment));

    	return $affectedLines;
	}

}