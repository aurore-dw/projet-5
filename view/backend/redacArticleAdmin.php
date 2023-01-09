<?php $title = 'Rédaction des articles(admin)'; ?>
<?php ob_start(); 

?>
 
<div class="container">
  <div align="center">
    <br><br><br>      
   <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=listArticlesAdmin">Liste des articles</a>
   <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=getCommentAdmin&amp;moderation=1">Modérer les commentaires</a>
  <br/><br/>
   
  <h3>Rédaction d'un nouveau post : </h3><br/>

  <form class="form" method="post" action="index.php?action=writeArticle&amp;id= ">
         <!--<select class="form-control mb-2" name="id_categorie">
            <option value="1">Manga</option>
            <option value="2">Anime</option>
            <option value="3">Jeux vidéo</option>
         </select>-->
   <input class="form-control" type="text" placeholder="Titre de l'article" id="title" name="title" /><br>
   <input class="form-control" type="text" placeholder="Chapô de l'article" id="chapo" name="chapo" /><br><br>
   <textarea class="mytextarea" name="content"  rows="20" cols="50" placeholder="Votre article"></textarea><br>
   <button type="submit" name="publish"class="btn btn-primary">Publier</button><br><br>
 </form>

  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>