<?php
require('../utils/db.php');
$db = dbConnect();

$stmt = $db->prepare('SELECT * FROM authors ORDER BY name');
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
          <div class="form-group">
            <label for="pages">Nombre de pages</label>
            <input
            name="pages"
            type="number"
            class="form-control"
            id="pages"
            >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wikipedia_link">Lien wikipedia</label>
            <input
            name="wikipedia_link"
            type="number"
            class="form-control"
            id="wikipedia_link"
            >
          </div>
          <div class="form-group">
            <label for="year">Année de parution</label>
            <input
            name="year"
            type="number"
            class="form-control"
            id="year"
            >
          </div>
          <div class="form-group">
            <label for="language">Langue</label>
            <input
            name="language"
            type="text"
            class="form-control"
            id="language"
            >
          </div>
          <div class="form-group">
            <label for="country">Pays</label>
            <input
            name="country"
            type="text"
            class="form-control"
            id="country"
            >
          </div>
        </div>
      </form>
    </div>
  </body>

  </html>
