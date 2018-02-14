<?php

// INSERT
function insertArticle()
{
    $ArticleDatas = new dataValidation('articles', $_REQUEST);
    $ArticleDatas->validate(array(
        'TitleArticle' => '*s',
        'AuthorArticle' => '*s', 
        'ContentArticle' => '*s'
    ));
    
    if (isset($ArticleDatas->result['error'])){
        return $ArticleDatas;
    }
    
    $query = new Query();
    
    $values = array(
        'IdArticle' => null,
        'TitleArticle' => $ArticleDatas->result['TitleArticle'],
        'AuthorArticle' => $ArticleDatas->result['AuthorArticle'],
        'ContentArticle' => $ArticleDatas->result['ContentArticle'], 
        'DateArticle' => date( 'Y-m-d H:i:s' )
    );
    return $query->insert( 'articles', $values );
}


// UPDATE
function updateArticle()
{
    $ArticleDatas = new dataValidation('articles', $_REQUEST);
    $ArticleDatas->validate(array(
        'article' => '*i', 
        'TitleArticle' => '*s',
        'AuthorArticle' => '*s', 
        'ContentArticle' => '*s'
    ));
    
    if (isset($ArticleDatas->result['error'])){
        return $ArticleDatas;
    }
    
    $query = new Query();
    
    $id = 'IdArticle = ' . $ArticleDatas->result['article'];
    $values = array(
        'TitleArticle' => $ArticleDatas->result['TitleArticle'],
        'AuthorArticle' => $ArticleDatas->result['AuthorArticle'],
        'ContentArticle' => $ArticleDatas->result['ContentArticle']
    );
    return $query->update( 'articles', $values, $id );
}


// DELETE
function deleteArticle($IdArticle)
{
    $ArticleDatas = new dataValidation('articles', $_REQUEST);
    $ArticleDatas->validate(array(
        'item' => '*i'
    ));
    
    if (isset($ArticleDatas->result['error'])){
        return $ArticleDatas;
    }
    
    $query = new Query();
    
    $values = 'IdArticle = ' . $ArticleDatas->result['item'];
    
    /**
     * Remove any comments before removing the article
     */
    $query->delete( 'comments', $values );
    
    /**
     * Remove the article
     */
    return $query->delete( 'articles', $values );
}


// CONTROLLER //
switch( $action ){
	
	case 'insert' : 
		$process = insertArticle();
		if( $process === true ){
                    //header( 'location:index.php?page=home' );
                    $page = 'home';
                }else{
                    $page = 'articleform';
                }
		break;
	
	case 'update' : 
		$process = updateArticle();
		if( $process === true ){
                    //header( 'location:index.php?page=home' );
                    $page = 'articleform';
                }else{
                    $page = 'articleform';
                }
		break;
	
	case 'delete' : 
		$process = deleteArticle();	
		if( $process === true ){
                    //header( 'location:index.php?page=home' );
                    $page = 'home';
                }
		break;
}
