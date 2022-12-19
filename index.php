<?php
session_start();

require 'vendor/autoload.php';

use Controllers\ControllerAccueil;
use Controllers\ControllerUser;
use Controllers\ControllerAdmin;

use Models\Manager;
use Models\MembersManager;
use Models\PostManager;


try 
{

	if (isset($_GET['action'])) {
		
		// Affichage page d'accueil
		if ($_GET['action'] == 'pageAccueil') {
        $display = new ControllerAccueil();
  			$contact = $display->pageAccueil(); 
		}

        // Affichage formulaire d'inscription   
        if ($_GET['action'] == 'displFormulContact') {
        $display = new ControllerUser();
            $contact = $display->displFormulContact(); 
        }

        // Ajout membre 
        if ($_GET['action'] == 'addMember') {
            if (isset($_POST['username'])  AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirmpassword'])) { 
                $username = htmlspecialchars($_POST['username']);
                $mail = htmlspecialchars($_POST['mail']);
                $password = ($_POST['password']);
                $confirmpassword = ($_POST['confirmpassword']);
                if(!empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirmpassword'])) {
                    if($_POST['password'] == $_POST['confirmpassword']){
                     $pseudolength = strlen($username);
                        if($pseudolength > 2) {
                            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                $inscription = new ControllerUser();
                                $contact = $inscription->addMember($_POST['username'], $_POST['mail'], $_POST['password']); 
                            } else {
                                echo '<p style= "border: 1px solid red; text-align: center; font-size: 25px; margin: 90px 90px 90px;">Adresse mail non valide !</p>';
                            }
                        } else {
                            echo '<p style= "border: 1px solid red; text-align: center; font-size: 25px; margin: 90px 90px 90px;">Votre pseudo doit contenir plus de 2 caractères !</p>';
                        }
                    } else {
                        echo '<p style= "border: 1px solid red; text-align: center; font-size: 25px; margin: 90px 90px 90px;">Les champs doivent être identiques !</p>';
                    }
                } else {
                    echo '<p style= "border: 1px solid red; text-align: center; font-size: 25px; margin: 90px 90px 90px;">Tous les champs doivent être complétés !</p>';
                }
            }
        }

        //Affichage formulaire de connexion
        if ($_GET['action'] == 'displConnexion') {
        $display = new ControllerUser();
            $contact = $display->displConnexion(); 
        }

        //Deconnexion
         if ($_GET['action'] == 'deconnexion') {
        $deconnex = new ControllerUser();
            $newdeconnex = $deconnex->deconnexion();
        }

        //Affiche l'interface de redaction de chapitre Admin
        if ($_GET['action'] == 'editoInterfaceAdmin') {
          if(!isset($_SESSION['username']) ||($_SESSION['droits'] == 0)){
            pageAccueil();
        }else{
            if (isset($_SESSION) && $_SESSION['droits'] == '1'){
              $affInterface = new ControllerAdmin();
              $interface = $affInterface->editoInterfaceAdmin();
            } 
        }
    }

        //Redaction articles Admin
      if ($_GET['action'] == 'writeArticle') {
        if(isset($_SESSION['user_id']) and isset($_POST['title']) and isset($_POST['chapo']) and isset($_POST['content'])) {
          $title = ($_POST['title']);
          $content = ($_POST['content']);
          $idUser = ($_SESSION['user_id']);
          $chapo = ($_POST['chapo']);
            if (!empty(trim($_POST['title'])) and !empty(trim($_POST['chapo'])) and !empty(trim($_POST['content']))){
              $redacArticle = new ControllerAdmin();
              $aff = $redacArticle->writeArticle($_SESSION['user_id'], $_POST['title'], $_POST['chapo'], $_POST['content']);  
            }else{
                throw new Exception('Vous n\'avez pas saisi d\'article !');
              }
        }    
      }

      //Affichage liste des articles Admin
        if ($_GET['action'] == 'listArticlesAdmin')
        {
            if (!isset($_SESSION['droits']) || ($_SESSION['droits'] == 0))
            { //Condition de sécurité pour éviter d'accéder à l'interface Admin par l'URL
                header('Location: index.php');
            }
            else
            {
              $listarticlesAdmin = new ControllerAdmin();
              $list = $listarticlesAdmin->listArticlesAdmin();
            }
        }

        //Affiche un chapitre à modifier Admin
        if ($_GET['action'] == 'chapitAdmin') {
            if (!isset($_SESSION['droits']) || ($_SESSION['droits'] == 0)){
                header('Location: index.php');
            }else{
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controlleradmin = new ControllerAdmin();
                    $affiche = $controlleradmin->chapitAdmin();
                }else {
                    echo '<p style= "border: 1px solid red; text-align: center; font-size: 25px; margin: 90px 90px 90px;">Petit problème d\'affichage du post !</p>';
                }
            }   
        }

    //Modifie article Admin
        if ($_GET['action'] == 'editArticle')
        {
            if (!isset($_SESSION['droits']) || ($_SESSION['droits'] == 0)){ 
            ////Condition de sécurité pour éviter d'accéder à l'interface Admin par l'URL
                header('Location: index.php');
            }else{
                if ((isset($_GET['id'])) && (!empty($_GET['id']))){
                    $controlleradmin = new ControllerAdmin();
                    $modifier = $controlleradmin->editArticle($_POST['title'], $_POST['chapo'], $_POST['content'], $_GET['id']); 
                }else{
                    throw new Exception('Impossible de modifier l\'article !');
                }
            }
        }

	

}else { //Si aucune action, affiche la page d'accueil 
        $vue = new ControllerAccueil();
        $accueil = $vue->pageAccueil();   	 
	}

}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
