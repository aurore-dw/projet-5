<?php $title = 'Liste des articles en ligne (admin)'; ?>
<?php ob_start();?>

<div class="container">
    <br><br>
  <div align="center">
    <br><br>
   <em><h3 class="mt-4">Liste des derniers articles</h3></em><br>
   <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=editoInterfaceAdmin">Rédiger un article</a>
   <a class="btn btn-sm btn-outline-primary mt-4" href="index.php?action=getCommentAdmin&amp;moderation=1">Modérer les commentaires</a>
   <br><br>
</div>

<!-- Mise en forme du tableau -->
<div class="container">
  <table class="table table-hover">
    <tbody>
        <thead class="thead-dark">
            <tr>
                <th>Titre</th>
                <th>Chapo</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
        </thead>
</div>

<?php
	//On affiche les lignes du tableau une à une à l'aide d'une boucle
    while($data = $posts->fetch())
    {
?>

<tr>
  <td><?php echo nl2br(htmlspecialchars($data['title']));?></td>
  <td><?php echo nl2br(htmlspecialchars($data['chapo']));?></td>
  <td><?php echo ($data['creation_date']);?></td>
  <td><a class="btn btn-sm btn-outline-primary" name ="edit" href="index.php?action=chapitAdmin&id=<?php echo $data['post_id']; ?>">Modifier l'article</a> <a class="btn btn-sm btn-outline-primary" name="delete" onclick="return confirm('Voulez-vous vraiment suprimer cet article ?')" href="index.php?action=suppArticle&id=<?php echo $data['post_id']; ?>">Supprimer l'article</a></td>
</tr>

<?php 
    } //fin de la boucle, le tableau contient tous les articles de la bdd 
    $posts->closeCursor(); 
?>

<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>