<?php
require('../utils/db.php');
//throw new Exception("Invalid title");

$db = dbConnect();

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;


$stmt = $db->prepare('SELECT * FROM authors ORDER BY name');
$stmt->execute();
$authors = $stmt->fetchAll();

if (isset($_POST['book'])) {

  $id= isset($_POST['id'])? (int) $_POST['id'] : null;

  $title = (string) $_POST['title'];
  $description = (string) $_POST['description'];
  $authorId = (int) $_POST['author_id'];
  $pages = (int) $_POST['pages'];
  $wikipediaLink = (string) $_POST['wikipedia_link'];
  $year = (int) $_POST['year'];
  $language = (string) $_POST['language'];
  $country = (string) $_POST['country'];
  if (!preg_match('/^(http|https):\/\/([a-z]{2})\.wikipedia\.org\/([a-zA-Z0-9-_\/%:]+)?/i', $wikipediaLink)) {
    $wikipediaLink = '';
  }
  if ($id) {
    $stmt1 = $db->prepare('UPDATE `books`
      SET
      `title`= :title,
      `description`= :description,
      `author_id`= :author_id,
      `pages`= :pages,
      `wikipedia_link`= :wikipedia_link,
      `year` = :year,
      `language` = :language,
      `country` = :country
      WHERE id =:id
    ');
    $stmt1->bindParam(':id',$id, PDO::PARAM_INT);

  } else {
    $stmt1 = $db->prepare('INSERT INTO
      `books`
      (`title`, `description`, `author_id`, `pages`, `wikipedia_link`, `year`, `language`, `country`)
      VALUES (:title,
        :description,
        :author_id,
        :pages,
        :wikipedia_link,
        :year,
        :language,
        :country
      )
    ');
  }

  $stmt1->bindParam(':title',$title, PDO::PARAM_STR);
  $stmt1->bindParam(':description',$description, PDO::PARAM_STR);
  $stmt1->bindParam(':author_id',$authorId, PDO::PARAM_INT);
  $stmt1->bindParam(':pages',$pages, PDO::PARAM_INT);
  $stmt1->bindParam(':wikipedia_link',$wikipediaLink, PDO::PARAM_STR);
  $stmt1->bindParam(':year',$year, PDO::PARAM_INT);
  $stmt1->bindParam(':language',$language, PDO::PARAM_STR);
  $stmt1->bindParam(':country',$country, PDO::PARAM_STR);
  $stmt1->execute();

  if (!$id) {
    $id = $db->lastInsertId();
    header('Location:' .$_SERVER['REQUEST_URI'].'?id=' .$id);
  }



}

if ($id){
  $stmt2 = $db->prepare('SELECT * FROM books WHERE id=:id');
  $stmt2->bindParam(':id',$id, PDO::PARAM_INT);
  $stmt2->execute();
  $book = $stmt2->fetch();
  //var_dump($book);
}
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
          <h1 class="mb-3 mt-3"><?php echo !isset($book) ? "Ajouter un livre" : "Editer : " . $book['title'];?> </h1>
          <form action="./<?php echo isset($book) ? '?id=' . $book['id']:'';?>" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title">Titre</label>
                  <input
                  require
                  name="title"
                  value="<?php echo isset($book) ? $book['title']:'';?>"
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
                  <textarea name="description"
                  value="<?php echo isset($book) ? $book['description']:'';?>"
                  class="form-control" id="description" rows="3"><?php echo isset($book) ? $book['description']:'';?></textarea>
                </div>
                <div class="form-group">
                  <label for="author">Auteur</label>
                  <select name="author_id"class="form-control" id="author">
                    <?php foreach ($authors as $author){?>
                      <?php if (isset($book) && $book['author_id'] == $author['id']) { ?>
                        <option selected="selected" value="<?php echo $author['id']; ?>">
                          <?php echo $author['name']; ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo $author['id']; ?>">
                          <?php echo $author['name']; ?>
                        </option>
                      <?php } ?>
                      <option><?php echo $author['name'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pages">Nombre de pages</label>
                  <input
                  name="pages"
                  value="<?php echo isset($book) ? $book['pages']:'';?>"
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
                  value="<?php echo isset($book) ? $book['wikipedia_link']:'';?>"
                  type="text"
                  class="form-control"
                  id="wikipedia_link"
                  >
                </div>


                <div class="form-group">
                  <label for="year">Année de parution</label>
                  <input
                  name="year"
                  value="<?php echo isset($book) ? $book['year']:'';?>"
                  type="number"
                  class="form-control"
                  id="year"
                  >
                </div>
                <div class="form-group">
                  <label for="language">Langue</label>
                  <input
                  name="language"
                  value="<?php echo isset($book) ? $book['language']:'';?>"
                  type="text"
                  class="form-control"
                  id="language"
                  >
                </div>
                <div class="form-group">
                  <label for="country">Pays</label>
                  <input
                  name="country"
                  value="<?php echo isset($book) ? $book['country']:'';?>"
                  type="text"
                  class="form-control"
                  id="country"
                  >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" value="<?php echo isset($book) ? $book['id']:'';?>" name="id">
                <button name="book" type="submit" class="btn btn-primary">Valider</button>
              </div>
            </div>
          </div>
        </body>

        </html>
