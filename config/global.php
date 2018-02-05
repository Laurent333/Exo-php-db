<?php

/*
*	Active le fichier de configuration
*/
include( 'config.php' );

/*
*	Connexion à la base de données
*/
include( 'dbconnect.php' );

/*
*	Fonctions génériques utiles pour le site
*/
include( 'functions.php' );

/*
*	Démarrage de la session
*/
session_start();

/*
* Gestion des pages et des actions
*/
if( isset( $_GET[ 'page' ] ) ) $page = $_GET[ 'page' ]; else $page = ''; 
if( isset( $_GET[ 'action' ] ) ) $action = $_GET[ 'action' ]; else $action = '';

/* 
*	Dans le cas où action est insert, update ou delete
*	La page concernee est chargee et un retour de $page sera effectue 
*	en fonction de la reussite de l'operation
*/
if( $action == 'insert' || $action == 'update' || $action == 'delete' ){
	include( 'sources/'.$page.'/'.$page.'.sql.php' );	
}
?>