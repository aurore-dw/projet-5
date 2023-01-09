<?php $title = "Liste de tous les articles" ?>

<?php ob_start(); ?>

 <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/fond-js.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Blog</h2>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

<div class="container">
<br><br><br>    
<h2 style="text-align:center;">Derniers articles du blog :</h2><br>
</div>

<?php
while ($post = $articles->fetch())
{

?>

<div class="news">
    <div class="container mt-4">
        <div class="card card-blog">
            <div class="card-body">
                <h3 class="card-title"><?php echo $post['title']; ?></h3>
                <p><?php echo nl2br($post['chapo']);?></p>
                <small class="text-muted"><em>le <?= $post['creation_date'] ?> rédigé par <?php echo $post['username']; ?> </em></small><br>
            </div>
            <div class="card-footer">
                <em><a href="index.php?action=affArticle&amp;id=<?php echo $post['post_id']; ?>">Lire l'article</a></em>
            </div>
        </div>
    </div>
</div>

<?php

} // Fin de la boucle des articles
$articles->closeCursor();
?>

<!--<a class="btn btn-secondary btn-lg btn-block" href="index.php?action=listChapitres&amp;">Découvrir tous les chapitres</a><br>-->

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>