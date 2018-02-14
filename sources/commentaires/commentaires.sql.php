<?php

// INSERT
function insertCommentaire()
{
    $CommentDatas = new dataValidation('comments', $_REQUEST);
    $CommentDatas->validate(array(
        'PseudoCommentaire' => '*e',
        'TexteCommentaire' => '*s', 
        'IdArticle' => '*i'
    ));
    
    if (isset($CommentDatas->result['error'])){
        return $CommentDatas;
    }
    
    $query = new Query();

    $values = array(
        'PseudoComment' => $CommentDatas->result['PseudoCommentaire'],
        'TextComment' => $CommentDatas->result['TexteCommentaire'],
        'IdArticle' => $CommentDatas->result['IdArticle'], 
        'DateComment' => date( 'Y-m-d H:i:s' )
    );
    return $query->insert( 'comments', $values );
}


// UPDATE
function updateCommentaire( $IdCommentaire )
{

}


// DELETE
function deleteCommentaire( $IdCommentaire )
{
    $CommentDatas = new dataValidation('comments', $_REQUEST);
    $CommentDatas->validate(array(
        'item' => '*i'
    ));
    
    if (isset($CommentDatas->result['error'])){
        return $CommentDatas;
    }
    
    $query = new Query();
    
    $values = 'IdComment = ' . $CommentDatas->result['item'];
    return $query->delete( 'comments', $values );

}


// CONTROLER //
switch( $action ){
	
	case 'insert' : 
		$process = insertCommentaire();	
		if( $process == 'ok' ) {
                    //header( 'location:index.php?page=home' );
                    $page = 'home';
                } else {
                    $page = 'home';
                }
		break;
	
	case 'update' : 
		$process = updateCommentaire( $_GET[ 'item' ] );	
		if( $process == 'ok' ) {
                    header( 'location:index.php?page=home' );
                    //$page = 'home';
                } else {
                    $page = 'home';
                }
		break;
	
	case 'delete' : 
		$process = deleteCommentaire( $_GET[ 'item' ] );	
		if( $process == 'ok' ) {
                    //header( 'location:index.php?page=home' );
                    $page = 'home';
                }
		break;
}
