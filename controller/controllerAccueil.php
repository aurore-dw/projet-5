<?php

namespace Controllers;

require 'vendor/autoload.php';

class ControllerAccueil
{
	//Affichage page d'accueil
	public function pageAccueil() 
		{
			require('view/frontend/accueil.php');
		}
}