<?php $title="Liste des livres";?>
<?php ob_start();?>


<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
  </form>
</nav>
<h1 style="text-align:center;">Liste des livres</h1>
<div class="container">
  <div class="row">

    <?php
    foreach ($books as $book) {
      ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-3">
        <div class="card h-100">
          <img src=<?php echo $book['image']?$book['image']:"public/images/books/book.jpg"; ?> class="card-img-top" alt="image" style="width:10rem;height:18rem;display: block;margin-left: auto;margin-right: auto">
          <div class="card-body" >
            <h5 class="card-title" style="color:blue;font-weight:bold;text-align:center;"><?php echo $book['title']; ?></h5>
            <p class="card-text" style="text-align:center;">(Auteur) <?php echo $book['author']?$book['author']:"Inconnu"; ?></p>
            <p class="card-text" style="text-align:center;">(Pays) <?php echo $book['country']; ?></p>
            <p class="card-text" style="text-align:center;">(Année) <?php echo $book['year']; ?></p>
            <p class="card-text" style="text-align:center;">(Langue) <?php echo $book['language']; ?></p>
          </div>

          <div class="card-footer">
            <p class="card-text"><a href="?action=book&id=<?php echo $book['id']; ?>" class="btn btn-info" style="display: block;margin-left: auto;margin-right: auto">Description</a></p>
            <a href="http://www.google.fr" target="_blank"class="btn btn-primary" style="display: block;margin-left: auto;margin-right: auto">Ajouter au panier</a>
          </div>
        </div>
      </div>


      <?php
    }
    ?>
    <?php
    require('models/books.php');

// Partie "Liens"
/* On calcule le nombre de pages */
$nombreDePages = ceil($count / ($limit));

/* Si on est sur la première page, on n'a pas besoin d'afficher de lien
 * vers la précédente. On va donc l'afficher que si on est sur une autre
 * page que la première */
if ($page > 1):
    ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
endif;

/* On va effectuer une boucle autant de fois que l'on a de pages */
for ($i = 1; $i <= $nombreDePages; $i++):
    ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
endfor;

/* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
if ($page < $nombreDePages):
    ?>— <a href="?page=<?php echo $page + 1; ?>">Page suivante</a><?php
endif;
?>
  </div>
</div>



<pre>
  <?php var_dump($books);?>
</pre>
<?php $content=ob_get_clean();?>
<?php require('public/index.php');?>
