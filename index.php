<?php
session_start();

require 'vendor/autoload.php';

use Controllers\ControllerAccueil;


use Models\Manager;


try 
{

	if (isset($_GET['action'])) {
		
		// Affichage page d'accueil
		if ($_GET['action'] == 'pageAccueil') {
        $display = new ControllerAccueil();
  			$contact = $display->pageAccueil(); 
		}
		

}else { //Si aucune action, affiche la page d'accueil 
        $vue = new ControllerAccueil();
        $accueil = $vue->pageAccueil();   	 
	}

}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
