<?php
function selectArticles()
{
    $query = new Query();
    return $query->select( 'SELECT * FROM articles ORDER BY DateArticle DESC' );
}

function selectArticleById($IdArticle)
{
    $query = new Query();
    return $query->select('SELECT * FROM articles WHERE IdArticle = ' . $IdArticle);
}

function selectArticleByDate($dateStart, $dateEnd)
{
    $dStart = date('Y-m-d', mktime(0, 0, 0, 
            date("m", strtotime($dateStart)), 
            1, 
            date("Y", strtotime($dateStart))
        ));
    $dEnd = date('Y-m-d', mktime(23, 59, 59, 
            date("m", strtotime($dateEnd)), 
            date("t", strtotime($dateEnd)), 
            date("Y", strtotime($dateEnd))
        ));
    
    $query = new Query();
    return $query->select('SELECT * FROM articles WHERE DateArticle BETWEEN \'' . $dStart . '\' AND \'' . $dEnd . '\' ORDER BY DateArticle DESC');
}

$article = null;
if (isset($_GET['article']) && $_GET['article'] != "" && is_numeric($_GET['article'])){
    $article = selectArticleById( intval( $_GET['article'] ) );
}
$articlesMenu = selectArticles();
if (!empty($_GET['date'])){
    $articles = selectArticleByDate( $_GET['date'], $_GET['date'] );
} else if ($article){
    $articles = $article;
} else {
    $articles = $articlesMenu;
}
