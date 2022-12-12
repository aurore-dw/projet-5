<?php

namespace Controllers;

require 'vendor/autoload.php';

use Models\Manager;
use Models\MembersManager;

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

}