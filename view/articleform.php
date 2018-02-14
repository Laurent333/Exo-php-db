
<?php if ($article){ ?>

<h2><?php echo $article[0]['TitleArticle']; ?></h2>
<form action="index.php?page=articles&action=update&article=<?php echo $article[0]['IdArticle']; ?>" method="post">

<?php }else{ ?>
    
<h2>Ajouter un article</h2>
<form action="index.php?page=articles&article=<?php echo $article[0]['IdArticle']; ?>&action=insert" method="post">
    
<?php } ?>
    
    <table class="admin_form" cellpadding="0" cellspacing="0" width="100%">

        <tr>
            <td width="30%"><label for="TitleArticle">Titre</label></td>
            <td><input class="<?php if(isset($process->result['error']['TitleArticle'])){ echo $process->result['error']['TitleArticle']; } ?>" id="TitleArticle" type="text" name="TitleArticle" value="<?php if (isset($process->result['TitleArticle'])){ echo $process->result['TitleArticle']; }else if ($article){ echo $article[0]['TitleArticle']; } ?>" /></td>
        </tr>
        <tr>
            <td width="30%"><label for="AuteurArticle">Auteur</label></td>
            <td><input class="<?php if(isset($process->result['error']['AuthorArticle'])){ echo $process->result['error']['AuthorArticle']; } ?>" id="AuteurArticle" type="text" name="AuthorArticle" value="<?php if (isset($process->result['AuthorArticle'])){ echo $process->result['AuthorArticle']; }else if ($article){ echo $article[0]['AuthorArticle']; } ?>" /></td>
        </tr>
        <tr>
            <td valign="top"><label for="ContenuArticle">Contenu de l'article</label></td>
            <td><textarea class="<?php if(isset($process->result['error']['ContentArticle'])){ echo $process->result['error']['ContentArticle']; } ?>" id="ContenuArticle" name="ContentArticle"><?php if (isset($process->result['ContentArticle'])){ echo $process->result['ContentArticle']; }else if ($article){ echo $article[0]['ContentArticle']; } ?></textarea></td>
        </tr>
        <tr>    
            <td></td>
            <td>
                <a class="btn" href="index.php?page=home&article=<?php echo $article[0]['IdArticle']; ?>">Annuler</a>
                <input type="submit" value="Envoyer" />
            </td>
        </tr>
                
    </table>
</form>