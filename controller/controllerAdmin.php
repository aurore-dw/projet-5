<?php

namespace Controllers;

require 'vendor/autoload.php';

use Models\MembersManager;
use Models\Manager;
use Models\PostManager;

class ControllerAdmin
{
	
	//Affiche l'interface de redaction article admin
    public function editoInterfaceAdmin()  
    {
	   require('view/backend/redacArticleAdmin.php');
    }

    //Rédaction article
    public function writeArticle($idUser, $title, $chapo, $content) 
    {
	   $articleWrite = new PostManager();//Création nouvel objet
	   $article = $articleWrite->postArticle($idUser, $title, $chapo, $content);//Retour modèle fonction postArticle
	
	   if($article === false) {
		  die('<p style= "border: 1px solid red; text-align: center; font-size: 55px; margin: 90px 90px 90px;">Impossible d \'ajouter un chapitre.');//Condition si false on arrête le script
	   }else{//Si true chargement de la page qui affichera la liste des articles
		  header('Location: index.php');
	   }
    }

    //Affichage de la liste des posts Admin
    public function listArticlesAdmin() 
    {
	   $postManager = new PostManager();
	   $posts = $postManager->getArticlesAdmin();
	   require_once('view/backend/listArticlesAdmin.php');
    }

    //Récupération d'un post admin par id
    public function chapitAdmin() 
    { 	
	   $postManager = new PostManager();
	   $post = $postManager->getArticle($_GET['id']);
	
	   require('view/backend/editArticleAdmin.php');
    }

    //Modification d'un post
    public function editArticle($title, $chapo, $content, $postId) 
    {
	   $artModif = new PostManager();
	   $artOk = $artModif->updateArticle($title, $chapo, $content, $postId);
	
	   if($artOk === false) {
		  die('<p style= "border: 1px solid red; text-align: center; font-size: 55px; margin: 90px 90px 90px;" Impossible de modifier un chapitre.</p>');
	   }else{
		  header('Location: index.php?action=listArticlesAdmin');
	   }
    }

    //Suppression d'un post et ses commentaires
    public function suppArticle($dataId) 
    {	

	   $supprime = new PostManager();
	   $deletedArticle = $supprime->deletArticle($dataId);
	
	   if($deletedArticle === false) {
		  die('<p style= "border: 1px solid red; text-align: center; font-size: 55px; margin: 90px 90px 90px;">Impossible de supprimer un chapitre.</p>');
	   }else{
		  header('Location: index.php?action=listArticlesAdmin');
	   }
    }

    //Récupère les nouveaux commentaires
    public function getCommentAdmin() 
    {
        $commentsManager = new CommentManager();
        $comments = $commentsManager->getCommentSignal($_GET['moderation']);

        require ('view/backend/moderCommentAdmin.php');
    }

    //Approuve les nouveaux commentaires
    public function approveComment($commentId) 
    {
        $commentsManager = new CommentManager();
        $approve = $commentsManager->deSignal($commentId);

        if ($approve === false)
        {
            throw new \Exception('Impossible d\'approuver le commentaire!');
        }
        else
        {
            header('Location: index.php?action=getCommentAdmin&moderation=1');
        }
    }

    // Supprimme un commentaire signalé
    public function delComment($commentId)
    {
        $delete = new CommentManager();
        $deletedComment = $delete->deleteComment($commentId);

        if ($deletedComment === false)
        {
            throw new \Exception('Impossible de supprimer ce commentaire !');
        }
        else
        {
            header('Location: index.php?action=getCommentAdmin&moderation=1');
        }
    }
	
}