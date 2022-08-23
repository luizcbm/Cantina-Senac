<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/principal.css">
  <title>Principal</title>
</head>

<body>

  <nav class="bg hover-circulo">
    <div class="lu">
      <h1>Olá <?php 
      
      if(isset($_SESSION['nome'])){
        echo  $_SESSION['nome'];
      } else {
        echo "Visitante";
      }
      
      ?>!!</h1>
    </div>
    <div class="image">
      <img src="../images/logosenac.png">
    </div>

    <style>
      /* Style The Dropdown Button */
      .dropbtn {
        padding: 16px;
        font-size: 20.8px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        background-color: red;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }

      /* The container <div> - needed to position the dropdown content */
      .dropdown {
        position: relative;
        display: inline-block;

      }

      /* Dropdown Content (Hidden by Default) */
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fa1414;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      /* Links inside the dropdown */
      .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      /* Change color of dropdown links on hover */
      .dropdown-content a:hover {
        background-color: red
      }

      /* Show the dropdown menu on hover */
      .dropdown:hover .dropdown-content {
        display: block;
      }

      /* Change the background color of the dropdown button when the dropdown content is shown */
      .dropdown:hover .dropbtn {
        background-color: red;
      }

      /*Leandro não deu um jeito :(*/
    </style>
    <div><a href="inicio.php" title="Inicio">Inicio</a>
      <a href="contato.php" title="Contato">Contato</a>
      <a href="login.php" title="Login">Login</a>
      <a href="sobre.php" title="Sobre">Sobre</a>

      <div class="dropdown">
        <button class="dropbtn">Cardapio</button>

        <div class="dropdown-content">
          <a href="refri.html">Bebidas</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
    </div>



  </nav>

  <?php
   
  if ($_SESSION['nome'] != "") {
    include "../include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM usuario');
    $sql->execute();
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    $path = "data:image/jpg:charset=utf8;base64,".base64_encode($info[0]['imagem']);
    ?>
<img width="100px" src="<?php echo $path; ?>">
    <h3><a href="listUsuario.php">Lista de Usuários</a></h3>
    <h3><a href="logout.php">Logout</a></h3>
  <?php } else { ?>
    <h1>Você não está logado!!</h1>
  <?php } ?>
  

 
</body>

</html>