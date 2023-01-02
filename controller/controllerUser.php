<?php

namespace Controllers;

require 'vendor/autoload.php';

use Models\Manager;
use Models\MembersManager;
use Models\PostManager;

class ControllerUser
{
	
    // Affichage formulaire d'inscription
    public function displFormulContact() 
    {
        require ('view/frontend/signup.php');
    }

    //Ajout membre après divers tests
    public function addMember($username, $mail, $password) 
    {
        $membre = new MembersManager();
        $test = new MembersManager();

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Hash mot de passe
        $testOk = $test->testMail($mail); // Test pour ne pas avoir de mail en doublon
        if ($testOk == 0)
        {
            $newMembre = $membre->insertMembre($username, $mail, $password);
            header("Location: index.php?action=displConnexion");
        }
        else
        {
            throw new \Exception('Adresse email déjà utilisée');
        }
    }

    //Connexion
    public function connexion($username,$password) 
    {
       $membre = new MembersManager();
       $connect = $membre->getConnect($username);
       $isPasswordCorrect = password_verify($_POST['password'], $connect['password']);

       if (!$connect)
       {
          echo 'Mauvais identifiant ou mot de passe !';
       }
       else{
          if ($isPasswordCorrect) {
             session_start();
             $_SESSION['user_id'] = $connect['user_id'];
             $_SESSION['username'] = $username;
             $_SESSION['droits'] = $connect['droits'];
             header("Location: index.php");

          }else{
             echo 'Mauvais identifiant ou mot de passe !';
          } 
       } 
    }

    //Déconnexion
    public function deconnexion()
    {
       session_start();
       $_SESSION = array();
       session_destroy();
       header("Location: index.php"); 
    }

    //Affichage de tous les articles User
    public function listAllArticles()
    {
        $allPosts = new PostManager();
        $articles = $allPosts->getAllArticles();
        require('view/frontend/listArticlesView.php');
    }

    //Reccupération d'un post et de ses commentaires
    public function affArticle()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getArticleUser($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/articleView.php');
    }

}