
<a class="btn" href="index.php?page=articleform">Ajouter un article</a>

<?php if ($articlesMenu){ ?>

    <ul class="menu">
        
        <li><a href="index.php?page=home">Afficher tous les articles</a></li>

    <?php
    foreach ($articlesMenu as $listArticle){
        $articleComments = selectCommentairesByIdArticle($listArticle['IdArticle']);
        
        displayTextIfChanged(
                'left_menu', 
                '<li class="menu_date"><a href="index.php?page=home&date=' . 
                date('Y-m', strtotime($listArticle['DateArticle'])) . 
                '">##</a></li>', 
                dateFormat($listArticle['DateArticle'], 'mm YYYY')
            );
        
    ?>
            
        <li class="<?php if (!empty($_GET['article']) && is_numeric($_GET['article']) && intval($_GET['article']) == $listArticle['IdArticle']){ echo 'selected'; } ?>">
            <a href="index.php?page=home&article=<?php echo $listArticle['IdArticle']; ?>"><?php echo $listArticle['TitleArticle']; ?> (<?php displayPluralText(count($articleComments), '## commentaire', '## commentaires'); ?>)</a>
        </li>
        
    <?php } ?>

    </ul>

<?php } ?>
