<?php $title = 'Article à modifier (Admin)'; ?>
<?php ob_start(); ?>

<div class="container">
	<div align="center">
        <br><br><br>
		<a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=listArticlesAdmin">Retour à la liste des articles</a>
        <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=editoInterfaceAdmin">Rédiger un article</a>
        <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=commentsAdmin&amp;moderation=1">Modérer les commentaires</a>
        <br><br>

		<div class="news">

        <h2>Modifier l'article</h2><br>

        <?php
        while ($data = $post_admin->fetch())
        {
        ?>
    		<h3>
    		  <!-- On affiche le titre de l'article -->
        	   <?php echo $data['title']; ?><br />
    		</h3>

            <p>
            <?php
             // On affiche le contenu de l'article
              echo nl2br($data['chapo']);
            ?>
            </p>

    		<p>
    		<?php
   	 		 // On affiche le contenu de l'article
    		  echo nl2br($data['content']);
    		?>
    		</p>

        </div><br>

        <form id="formulaire2" method="post" action="index.php?action=editArticle&id=<?php echo $data['post_id']; ?>">
    	   <input type="hidden" name="id" id="id" value="<?php echo $data['post_id']; ?>">
    	   <input type="text" class="form-control" name="title" id="title" value="<?php echo $data['title']; ?>"><br />
           <input type="text" class="form-control" name="chapo" id="chapo" value="<?php echo $data['chapo']; ?>"><br />
    	   <textarea name="content" id="content" rows="20" cols="50"><?= $data['content']; ?></textarea><br /><br />
    	   <input id="publish-btn" class="btn btn-sm btn-primary" type="submit" name="submit" value="Publier"><br><br>
        </form>

        <?php
        }
        ?>

    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>