<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Убрать попугая</title>
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
           $query4 = $pdo->query("SELECT * FROM `users` WHERE `online` = 1");
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

  <div class="container w-75">

  <div class="inside-container">
  

  <div class="type-container d-flex justify-content-around">
      <div class="container2">
      <div class="dropdown">
      <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Памятка "Наши поставщики"
      </a>
      <?php
             require 'configDB.php';
             $query = $pdo->query("SELECT * FROM `providers`");
               
             echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
             while($row = $query->fetch(PDO::FETCH_OBJ)){
            echo '<li><a class="dropdown-item">'.$row->name.'</a></li>';
             }
             echo '</ul>';
             echo '';
        ?>    
    </div>
    <br>
    <br>
    
      </div>
  

      <?php
          require 'configDB.php';
           $query4 = $pdo->query("SELECT * FROM `users` WHERE `online` = 1");
           $row4 = $query4->fetch(PDO::FETCH_OBJ);
           
          if($row4->admin == 1):
        ?>
            <form class="form1 w-50" action="/delete.php" method="post" >

        
            
<input type="text" class="form-control" name="providername" id="providername" placeholder="Введите имя поставщика, которого нужно убрать"> <br>


<div class="d-flex justify-content-center">
<button class="btn btn-danger" type="submit" name="upload">Убрать поставщика</button> <br>
</div>



</div>

</form>
            <?php endif;?>
  
  
 
  </div>
  
  
  </div>
    

  </div>
      

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
