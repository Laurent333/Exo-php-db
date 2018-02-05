<h2>Articles</h2>
<form action="index.php?page=articles&action=" method="post">
<table class="admin_form" cellpadding="0" cellspacing="0" width="100%">
     
    <tr>
        <td width="30%"><label for="TitreArticle">Titre</label></td>
        <td><input id="TitreArticle" type="text" name="TitreArticle" value="" /></td>
    </tr>
    <tr>
        <td width="30%"><label for="AuteurArticle">Auteur</label></td>
        <td><input id="AuteurArticle" type="text" name="AuteurArticle" value="" /></td>
    </tr>
    <tr>
        <td valign="top"><label for="ContenuArticle">Contenu de l'article</label></td>
        <td><textarea id="ContenuArticle" name="ContenuArticle"></textarea></td>
    </tr>
	<tr>    
        <td></td>
        <td>
            <a class="btn" href="index.php">Annuler</a>
            <input type="submit" value="Envoyer" />
        </td>
    </tr>
</table>