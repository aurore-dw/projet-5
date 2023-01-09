<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div align="center">
    <br><br><br>
    <a class="btn btn-sm btn-outline-primary mt-4" href="Index.php?action=listAllArticles" >Retour à la liste des articles</a>
</div>

<div class="container mt-4">
    <div class="news">
        <h3>
            <?php echo $post['title'];?>
        </h3>

        <p>
            <?php
            echo nl2br($post['chapo']);
            ?>
        </p>
    
        <p>
            <?php
            echo nl2br($post['content']);
            ?>
        </p>
    </div>

    <div class="row divider">    
            <div class="col-sm-12"><hr></div>
    </div>

</div>

<div class="container">
    <h3 class="pt-1">Commentaires :</h3><br>

<?php

while ($comment = $comments->fetch())
{
    if($comment['moderation']!=1){

?>

    <p class="pt-3"><strong><?php echo htmlspecialchars($comment['username']); ?></strong></p>
    <p><?= $comment['comment'] ?></p>
    <p><em>Envoyé le : </em><?= $comment['comment_date'] ?></p>
    
    <div class="row divider">    
            <div class="col-sm-12"><hr></div>
    </div>
    
<?php
    }
} // Fin de la boucle des commentaires

?>
<!-- Si une session est en cours, affiche le formulaire pour déposer un commentaire -->
<?php if(isset($_SESSION['user_id'])) : ?>
<!-- Ajout du formulaire pour déposer un commentaire -->
    <h3 class="pb-3">Déposer un commentaire</h3>
    <p>Si votre commentaire n'apparait pas tout de suite dans la liste c'est normal, il est en attente de modération par un administrateur !</p>
    <form action="index.php?action=addComment&amp;id=<?php echo $post['post_id'];?>" method="post">
        <textarea class="form-control" rows="6" placeholder="Votre commentaire" name="comment"></textarea><br>
        <input class="btn btn-primary" id="comment-btn" type="submit" name="submit" value="Laisser un commentaire"><br><br>
    </form>
<?php else : //Si pas de session, message d'erreur
        echo '<h3 class="error"><strong>Pour l\'ajout d\'un commentaire, veuillez vous connecter !</strong></h3><br>
            <a href="index.php?action=displFormulContact" class="btn btn-primary">Inscription</a>
            <a href="index.php?action=displConnexion" class="btn btn-primary">Connexion</a>';
        endif ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>