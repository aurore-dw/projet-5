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

   







	
}