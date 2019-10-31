<?php $title="Liste des livres";?>
<?php ob_start();?>
<h1>Liste des livres</h1>


<?php
foreach ($books as $book) {
  ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="container">
          <div class="card" style="width: 18rem;">
            <img src=<?php echo $book['imageLink']; ?> class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $book['title']; ?></h5>
              <div class="col-sm">
                <p class="card-text"><?php echo $book['link']; ?></p>
              </div>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php
}
?>



<pre>
  <?php var_dump($books);?>
</pre>
<?php $content=ob_get_clean();?>
<?php require('public/index.php');?>
