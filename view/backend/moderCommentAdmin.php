<?php $title = 'Commentaires à modérer (Admin)'; ?>

<?php ob_start(); ?>

<div class="container">
   <br><br>
   <div align="center">
         <br><br>
         <h2>Commentaires à approuver :</h2>
         <br>
         <a class="btn btn-sm btn-outline-primary" href="index.php?action=editoInterfaceAdmin">Rédiger un article</a>
         <a class="btn btn-sm btn-outline-primary" href="index.php?action=listArticlesAdmin">Retour vers la liste des articles</a>

         <?php
            $data = $comments;
            while ($data = $comments->fetch()): ?> 

         <div class="encart">
            <br>
            <p><em>Auteur du commentaire : <?= $data['username'] ?></em></p>
            <p><em>Le : <?= $data['comment_date'] ?></em></p>
            <p><em>Contenu du commentaire : <?= nl2br(htmlspecialchars($data['comment'])) ?></em></p>
            <br>
            <a href="index.php?action=delComment&amp;id=<?=$data['comment_id'] ?>"><button type="submit" name="delComment"class="btn btn-primary" onclick="return confirm('Voulez-vous vraiment suprimer ce commentaire ?')">Supprimer le commentaire</button></a>
            <a href="index.php?action=approveComment&amp;id=<?=$data['comment_id'] ?>"><button type="submit" name="approveComment" class="btn btn-primary">Approuver le commentaire</button></a><br><br>
         </div>

         <div class="row divider">    
            <div class="col-sm-12"><hr></div>
        </div>

         <?php
            endwhile;
            $comments->closeCursor();
             ?>
      </div>
   </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>