<?php

session_start();
$db=new PDO('mysql:host=localhost;dbname=books','root');

if(isset($_SESSION['id'])) {
  session_destroy();
}


var_dump($_POST);

if (isset($_POST['login'])){
  $login = (string) $_POST['login'];
  $password = (string) $_POST['password'];

  if(filter_var($login, FILTER_VALIDATE_EMAIL) && $password){
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare('SELECT * FROM users WHERE email= :login');
    //var_dump(password_verify($password));
    $stmt->bindParam(':login',$login, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
      $_SESSION['id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
    }

  }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="mt-3 mb-3">Se connecter</h1>
    <form action="./" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group mt-10">
            <label for="login">Email address</label>
            <input  required name="login" type="email" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Adresse email">
          </div>
          <div class="form-group ">
            <label for="password">Mot de passe</label>
            <input  required name="password"  type="password" class="form-control" id="password" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
