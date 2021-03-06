<?php
$mysql=new mysqli('localhost','root','root','dbparrots');

if($mysql){

}
else
die(' База данных не найдена или отсутствует доступ.');
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Уведомить</title>
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
  <h4 class="title text-center">
    Наши извинения, данного попугая уже нет в наличии, но как только у нас появится похожий попугайчик, мы обязательно свяжемся с вами!<br>
  </h4>
  <h5 class="title text-center">
    Для этого, пожалуйста укажите ваши контактные данные<br>
  </h5>

  <?php
  require 'configDB.php';
  $id = $_GET['id'];

$sql = 'SELECT * FROM `parrots` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);
$row = $query->fetch(PDO::FETCH_OBJ);
$typeid=$row->typesid;
$typename=$row->typename;
$query1 = $pdo->prepare($sql);
$query1->execute([$id]);
 $row1 = $query1->fetch(PDO::FETCH_OBJ);
 $query4 = $pdo->query("SELECT * FROM `users` WHERE `login` = '$currentuser'");
 $row4 = $query4->fetch(PDO::FETCH_OBJ);
 ?>
 <?php
 if($row4->login==''):
?>
<?php
echo '<form class="form1 d-flex flex-column justify-content-center" action="/notification.php" method="post">
<h6 class="text-center"></h6>
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Ваше имя</label>
  <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$row4->name.'" >
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail2" class="form-label">Ваш логин</label>
  <input type="text" class="form-control" name="loginname" id="exampleInputEmail2" aria-describedby="emailHelp" value="Войдите или зарегистрируйтесь" readonly>
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail2" class="form-label">Вид попугая</label>
  <input type="text" class="form-control" name="typename" id="exampleInputEmail2" aria-describedby="emailHelp" value="'.$typename.'" readonly>
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail3" class="form-label">Ваш контактный номер телефона</label>
  <input type="text" class="form-control" name="phonenumber" id="exampleInputEmail3" value="" aria-describedby="emailHelp" placeholder="Введите номер телефона без 8">
  
</div>

<button type="submit" class="btn btn-primary disabled">Подтвердить</button>
</form>';
?>

<?php else: ?>
 <?php
echo '<form class="form1 d-flex flex-column justify-content-center" action="/notification.php" method="post">
<h6 class="text-center"></h6>
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Ваше имя</label>
  <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$row4->name.'" >
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail2" class="form-label">Ваш логин</label>
  <input type="text" class="form-control" name="loginname" id="exampleInputEmail2" aria-describedby="emailHelp" value="'.$row4->login.'" readonly>
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail2" class="form-label">Вид попугая</label>
  <input type="text" class="form-control" name="typename" id="exampleInputEmail2" aria-describedby="emailHelp" value="'.$typename.'" readonly>
  
</div>
<div class="mb-3">
  <label for="exampleInputEmail3" class="form-label">Ваш контактный номер телефона</label>
  <input type="number" class="form-control" name="phonenumber" id="phonenumber" value="" aria-describedby="emailHelp" placeholder="Введите номер телефона без 8">
  <input type="number" class="form-control d-none" name="idparrot"  value="'.$id.'" >
  ';
  


  echo'
</div>


<button type="submit" class="btn btn-primary">Подтвердить</button>
</form>';
?>

<?php endif;?>


  

      
  <div class="type-container d-flex justify-content-center">
 
  </div>
  
  
  </div>
    

  </div>
      




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
