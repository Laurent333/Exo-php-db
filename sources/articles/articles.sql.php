<?php

// INSERT
function insertArticle(){
	

}


// UPDATE
function updateArticle( $IdArticle ){
	

}


// DELETE
function deleteArticle( $IdArticle ){


}


// CONTROLER //
switch( $action ){
	
	case 'insert' : 
		$process = insertArticle();	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		else 
			$page = 'articleform';
		break;
	
	case 'update' : 
		$process = updateArticle( $_GET[ 'item' ] );	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		else 
			$page = 'articleform';
		break;
	
	case 'delete' : 
		$process = deleteArticle( $_GET[ 'item' ] );	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		break;
}

?>