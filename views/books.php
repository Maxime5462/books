<?php $title="Liste des livres";?>
<?php ob_start();?>
<h1 style="display: block;margin-left: auto;margin-right: auto">Liste des livres</h1>

<div class="container">
  <div class="row">

    <?php
    foreach ($books as $book) {
      ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="container">
          <div class="card">
            <img src=<?php echo $book['imageLink']; ?> class="card-img-top" alt="image" style="width:13.7rem;height:18rem;display: block;margin-left: auto;margin-right: auto">
            <div class="card-body">
              <h5 class="card-title"><span style="color:blue;font-weight:bold;">Titre : <br> </span><?php echo $book['title']; ?></h5>
              <p class="card-text"><span style="color:red;">Auteur : <br></span><?php echo $book['author']; ?></p>
              <p class="card-text"><a href="<?php echo $book['link']; ?>" class="btn btn-info" style="display: block;margin-left: auto;margin-right: auto">Description</a></p>
              <a href="" class="btn btn-primary" style="display: block;margin-left: auto;margin-right: auto">Ajouter au panier</a>
            </div>
          </div>
        </div>
      </div>


      <?php
    }
    ?>
  </div>
</div>



<pre>
  <?php var_dump($books);?>
</pre>
<?php $content=ob_get_clean();?>
<?php require('public/index.php');?>
