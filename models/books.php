<?php
require_once 'utils/db.php';



function countBooks(){
  $db = dbConnect();
  $stmt = $db->prepare('SELECT COUNT(*) FROM books LIMIT 0,20');
  $stmt->execute();
  return $stmt->fetchColumn();
}

function getBooks()

{ $limit=20;
  $page=isset($_GET['page'])?(int) $_GET['page']:1;
  $count = countBooks();
  $offset=($page-1)*$limit;
  //var_dump($offset);
  //die($offset);

  $db = dbConnect();
  $stmt = $db->prepare('SELECT
    books.*,
    authors.name AS author
    FROM books
    LEFT JOIN authors
    ON books.author_id = authors.id
    LIMIT :offset,:limit
    ');

    $stmt->bindParam(':offset',$offset,PDO::PARAM_INT);
    $stmt->bindParam(':limit',$limit,PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    require('views/books.php');

  }

  function getBook($id)
  {
    $db = dbConnect();
    $stmt = $db->prepare('SELECT
      books.*,
      authors.name AS author
      FROM books
      LEFT JOIN authors
      ON books.author_id = authors.id
      WHERE books.id= :id
      ');
      $stmt->bindParam(':id',$id, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }
