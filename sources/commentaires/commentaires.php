<?php
function selectCommentaires()
{
    
}


function selectCommentairesByIdArticle($IdArticle)
{
    $query = new Query();
    return $query->select( 'SELECT * FROM comments WHERE IdArticle = ' . $IdArticle . ' ORDER BY DateComment DESC');
}
