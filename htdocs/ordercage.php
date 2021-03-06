<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Заказы</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid w-75">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="btn btn-primary" href="/">Попугаи от Кеши</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-primary" href="/cages.php">Клетки</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-primary" href="/providers.php">Наши поставщики</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-primary" href="/encyclopedia.php">Энциклопедия</a>
        </li>
        
      </ul>
      <?php
          require 'configDB.php';
          $currentuser=$_SESSION['name'];
          $query4 = $pdo->query("SELECT * FROM `users` WHERE `login` = '$currentuser'");
          $row4 = $query4->fetch(PDO::FETCH_OBJ);
           
          if($_COOKIE['user']==''):
        ?>
        <a class="btn btn-primary" href="/authorithation.php">Войти</a>
        <?php elseif($row4->admin == 1): ?>
          <a class="btn btn-primary" href="/administration.php">Администрирование</a>
          <a class="btn btn-primary" href="/orders.php">Заказы</a>
          <a class="btn btn-primary" href="/exit.php">Выход</a>
        <?php else: ?>
          <a class="btn btn-primary" href="/orders.php">Заказы</a>
          <a class="btn btn-primary" href="/exit.php">Выход</a>
        
        <?php endif;?>
        
      
    </div>
  </div>
</nav>

  <div class="container">

  <div class="inside-container">
    

    <div class="type-container d-flex justify-content-center">
  
    <div class="input-group mb-3 d-flex justify-content-center">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Выберите клетку</button>
        <ul class="dropdown-menu ">
        <?php
      require 'configDB.php';
      
      $id = $_GET['id'];

    $sql = 'SELECT * FROM `cages`';
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
     $count=1; 
      while($row = $query->fetch(PDO::FETCH_OBJ)) {

      echo '<div class="card d-flex justify-content-center" style="width: 18rem;">';
      $db = mysqli_connect("localhost","root","root","to-do"); 
        $sql = "SELECT * FROM `cages` WHERE `id`=$count";
        
        $sth = $db->query($sql);
        $result=mysqli_fetch_array($sth);
       echo '<img src="data:image/jpeg;base64,'.$row->img.'" class="card-img-top" alt="...">';
       echo  '<div class="card-body">';
       echo '<h5 class="card-title">Название : '.$row->name.'</h5>';
      echo '</div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Цена : '.$row->price.' руб.</li>
        
      </ul>';

      

      echo '<div class="card-body">
        
        <a href="/cages.php?id='.$row->typeid.'" class="card-link text-decoration-none m-0">Смотреть в каталоге</a> <br>
        <a href="/orders1.php?id='.$row->id.'" class="card-link text-decoration-none m-0">Забронировать</a>
      </div>
    </div>';
    $count+=1;
    }

    ?>    
        </ul>
        
    </div>

    

    </div>
      


  </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
