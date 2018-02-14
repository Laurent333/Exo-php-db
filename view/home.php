
    <h2>
        <?php
        displayPluralText(count($articles), '## article', '## articles');
        if (!empty($_GET['date'])){
            echo ' (' . dateFormat(date("Y-m-d", strtotime($_GET['date'])), 'mm YYYY') . ')';
        }
        ?>
    </h2>

<?php
foreach ( $articles as $row ){ ?>

    <div class="article">
    
        <h2>
            <?php
            if (count($articles) > 1){
                echo '<a href="index.php?page=home&article='.$row['IdArticle' ].'">'.$row[ 'TitleArticle' ].'</a>';
            } else {
                echo $row[ 'TitleArticle' ];
            }
            ?>
            <span>
                <a class="btn" href="index.php?page=articles&action=delete&item=<?php echo $row['IdArticle' ]; ?>">Supprimer</a>
            </span> 
            <span><a class="btn" href="index.php?page=articleform&article=<?php echo $row[ 'IdArticle' ]; ?>">Modifier</a></span>
        </h2>
        
        <p><strong><?php echo $row[ 'AuthorArticle' ]; ?></strong> <em>(<?php echo datetimeFormat( $row[ 'DateArticle' ], 'dd mm YYYY hh:mm:ss' ); ?>)</em></p>
        <p><?php echo nl2br($row[ 'ContentArticle' ]); ?></p>
    	
        
        <fieldset>
            
<?php $commentaires = selectCommentairesByIdArticle($row[ 'IdArticle' ]); ?>
            
            <legend><?php echo count($commentaires); ?> commentaires </legend>
            
<?php foreach ( $commentaires as $commentaire ){ ?>
                
                <p>
                <a href="index.php?page=commentaires<?php if (count($articles) === 1) echo '&article='.$commentaire[ 'IdArticle' ]; ?><?php if (!empty($_GET['date'])) echo '&date='.$_GET['date']; ?>&action=delete&item=<?php echo $commentaire[ 'IdComment' ]; ?>"><img src="images/cross.png" /></a>
                <strong><?php echo $commentaire[ 'PseudoComment' ]; ?> </strong> 
                <em>(<?php echo datetimeFormat( $commentaire[ 'DateComment' ], 'dd mm YYYY hh:mm:ss' ); ?>)</em><br />
                <?php echo nl2br($commentaire[ 'TextComment' ]); ?>
                
                </p>
                
<?php } ?> 

            <form action="index.php?page=commentaires<?php if (count($articles) === 1) echo '&article='.$commentaire[ 'IdArticle' ]; ?><?php if (!empty($_GET['date'])) echo '&date='.$_GET['date']; ?>&action=insert" method="post">
            <table class="admin_form" cellpadding="0" cellspacing="0" width="100%">
                
                <tr>
                    <td width="30%">
                        <label for="PseudoCommentaire">Email *</label>
                    </td>
                    <td>
                        <input class="<?php if (isset($process)) echo getProcessClass($process, 'PseudoCommentaire', $row['IdArticle'], 'IdArticle'); ?>" id="PseudoCommentaire" type="text" name="PseudoCommentaire" value="<?php if (isset($process)) echo getProcessValue($process, 'PseudoCommentaire', $row['IdArticle'], 'IdArticle'); ?>" />
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for="TexteCommentaire">Commentaire *</label>
                    </td>
                    <td>
                        <textarea class="<?php if (isset($process)) echo getProcessClass($process, 'TexteCommentaire', $row['IdArticle'], 'IdArticle'); ?>" id="TexteCommentaire" name="TexteCommentaire"><?php if (isset($process)) echo getProcessValue($process, 'TexteCommentaire', $row['IdArticle'], 'IdArticle'); ?></textarea>
                    </td>
                </tr>
                <tr>    
                    <td>
                        <input type="hidden" name="IdArticle" value="<?php echo $row['IdArticle']; ?>" />
                    </td>
                    <td>
                        <input type="submit" value="Envoyer le commentaire" />
                    </td>
                </tr>
            </table>
            </form>
                
        </fieldset>
    
	</div>

<?php } ?>
