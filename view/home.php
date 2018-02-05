<h2>Articles <span><a class="btn" href="index.php?page=articleform">Ajouter un article</a></span></h2>

    <div class="article">
    
        <h3>
        <a href="index.php?page=articleform&article=">Titre de l'article</a>
        <span><a class="btn" href="index.php?page=articles&action=delete&item=">supprimer</a></span>
        </h3>
        
        <p><em>Date - Nom de l'auteur</em></hp>
        <p>Contenu de l'article</p>	
    	
    	
        <fieldset>
            <legend> Commentaires </legend>
                
                <p>
                <a href="index.php?page=commentaires&action=delete&item="><img src="images/cross.png" /></a>
                <strong>Pseudo </strong>Commentaire
                </p>

            <form action="index.php?page=commentaires&action=insert" method="post">
            <table class="admin_form" cellpadding="0" cellspacing="0" width="100%">
                
                <tr>
                    <td width="30%"><label for="PseudoCommentaire">Pseudo</label></td>
                    <td><input id="PseudoCommentaire" type="text" name="PseudoCommentaire" value="" /></td>
                </tr>
                <tr>
                    <td valign="top"><label for="TexteCommentaire">Commentaire</label></td>
                    <td><textarea id="TexteCommentaire" name="TexteCommentaire"></textarea></td>
                </tr>
                <tr>    
                    <td>
                    <input type="hidden" name="IdArticle" value="" />
                    </td>
                    <td>
                        <input type="submit" value="Envoyer le commentaire" />
                    </td>
                </tr>
            </table>
            </form>
        </fieldset>
    
	</div>

