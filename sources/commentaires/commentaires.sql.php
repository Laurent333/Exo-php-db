<?php

// INSERT
function insertCommentaire(){

	
}


// UPDATE
function updateCommentaire( $IdCommentaire ){


}


// DELETE
function deleteCommentaire( $IdCommentaire ){


}


// CONTROLER //
switch( $action ){
	
	case 'insert' : 
		$process = insertCommentaire();	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		else 
			$page = 'home';
		break;
	
	case 'update' : 
		$process = updateCommentaire( $_GET[ 'item' ] );	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		else 
			$page = 'home';
		break;
	
	case 'delete' : 
		$process = deleteCommentaire( $_GET[ 'item' ] );	
		if( $process == 'ok' ) 
			header( 'location:index.php?page=home' );
		break;
}

?>