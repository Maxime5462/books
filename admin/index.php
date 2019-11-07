<?php
require('../utils/db.php');
$db = dbConnect();

$stmt = $db->prepare('SELECT * FROM authors');
$stmt->execute();
$authors = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title><?php echo $title ?></title>
</head>

<body>
  <div class="container">
    <form action="./" method="post">
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Titre</label>
            <input
            name="title"
            maxlength="10"
            type="text"
            class="form-control"
            id="title"
            aria-describedby="titleHelp"
            placeholder="Titre du livre...">
            <small id="titleHelp" class="form-text text-muted">Titre du livre</small>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description"class="form-control" id="description" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="author">Auteur</label>
            <select name="author_id"class="form-control" id="author_id">
              <?php foreach ($authors as $author){?>
                <option><?php echo $author['name'];?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </form>
    </div>
  </body>

  </html>
