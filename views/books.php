<?php $title="Liste des livres";?>
<?php ob_start();?>



  <h1 style="text-align:center;">Liste des livres</h1>
  <div class="container">
  <div class="row">

    <?php
    foreach ($books as $book) {
      ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-3">
          <div class="card h-100">
            <img src=<?php echo $book['imageLink']; ?> class="card-img-top" alt="image" style="width:10rem;height:18rem;display: block;margin-left: auto;margin-right: auto">
            <div class="card-body" >
              <h5 class="card-title"><span style="color:blue;font-weight:bold;"><?php echo $book['title']; ?></span></h5>
              <p class="card-text"><span style="color:red;">(Auteur) </span><?php echo $book['author']; ?></p>
                          </div>

            <div class="card-footer">
              <p class="card-text"><a href="<?php echo $book['link']; ?>" class="btn btn-info" style="display: block;margin-left: auto;margin-right: auto">Description</a></p>
              <a href="" class="btn btn-primary" style="display: block;margin-left: auto;margin-right: auto">Ajouter au panier</a>
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
