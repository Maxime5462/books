<?php $title="Liste des livres";?>
<?php ob_start();?>
<div class="container">
  <div class="row">
    <h1>Liste des livres</h1>


    <?php
    foreach ($books as $book) {
      ?>

      <div class="col-2">
        <div class="card">
          <img src=<?php echo $book['imageLink']; ?> class="card-img-top" alt="image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $book['title']; ?></h5>
            <p class="card-text"><?php echo $book['link']; ?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
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
