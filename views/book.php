<?php $title="Liste des livres";?>
<?php ob_start();?>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
  </form>
</nav>

<div class="container mt-5" style="text-align:center;" >
  <div class="row">

    <div class="col-md-3">

      <img src="<?php echo $book['imageLink'];?>" alt="image" style="height:295px;">
    </div>

    <div class="col-md-9">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Titre :</th>
            <th scope="col"><?php echo $book['title'];?></th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Auteur :</th>
            <td><?php echo $book['author'];?></td>

          </tr>
          <tr>
            <th scope="row">Pays :</th>
            <td><?php echo $book['country'];?></td>

          </tr>
          <tr>
            <th scope="row">Langue :</th>
            <td><?php echo $book['language'];?></td>

          </tr>
          <tr>
            <th scope="row">Pages :</th>
            <td><?php echo $book['pages'];?></td>

          </tr>
          <tr>
            <th scope="row">Année :</th>
            <td><?php echo $book['year'];?></td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php $content=ob_get_clean();?>
<?php require('public/index.php');?>
