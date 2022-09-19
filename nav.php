<?php
include_once "head.php";
include_once "MySql.php";

?>

<nav class="bg hover-circulo">

  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">

    <div style="max-height: 400px;" class="tamanho">
      <img src="assets/images/novalogo.png">
    </div>




    <div class="usuario">
      <?php

      if (isset($_SESSION['codigo'])) {
        $sql = $pdo->prepare('SELECT * FROM usuario WHERE codigo = ' . $_SESSION['codigo']);
        if($sql->execute()){
          $info = $sql->fetchAll(PDO::FETCH_ASSOC);
          $path = "data:image/jpg:charset=utf8;base64," . base64_encode($info[0]['imagem']);
        }  else{
          $info="";
          $path = "";
        }
        
      ?>
        <div class="dropdown">

          <img width="100px" style="border-radius: 90px;width: 7%;  height: 7%;  overflow: hidden;  width: 55px;  height: 55px;" src="<?php echo $path; ?>">
          <div class="dropdown-content">
            <?php

                if (isset($_SESSION['codigo=1'])) {
                  echo " <a href=altUsuario.php>Alterar</a>
                  <a href=listUsuario.php>Usuarios</a>";
                } else {
                  echo  "<a href=altUsuario.php>Alterar</a>
                  <a href=listUsuario.php>Usuarios</a>";
                } ?>

          </div>
        </div>
        <h6>Olá <?php

                if (isset($_SESSION['nome'])) {
                  echo $_SESSION['nome'];
                } else {
                  echo  "Visitante";
                } ?>!!</h6>
      <?php } else { ?>
        <img width="100px" style="border-radius: 90px;width: 7%;  height: 7%;  overflow: hidden;  width: 55px;  height: 55px; " src="assets/images/visitante.png">
      <?php } ?>
    </div>

    <div class="tul">
      <a href="index.php" title="Inicio">Inicio</a>
      <a href="sobre.php" title="Sobre">Sobre</a>
      <div class="dropdown">
        <a class="dropbtn">Cardapio</a>
        <div class="dropdown-content">
          <a href="refri.html">Bebidas</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
      <a href="contato.php" title="Contato"><img class="car" src="assets/images/carrinho.png"></a>
      <button class="per">
        <?php

        if (!isset($_SESSION['nome'])) {

          echo '<a href="login.php" title="Login">Logar</a>';
        } else {

          echo '<a href="logout.php" title="Logout">Desconectar-se</a>';
        }

        ?>
      </button>

    </div>
  </div>
</nav>

<style>
  .usuario {
    background-color: white;
    padding: 10px;
    border: 1px dashed gray;
    border-radius: 20px;
  }

  .usuario h6 {
    color: black;
  }

  button.dropbtn:focus,
  button.dropbtn:hover {
    transition: 1ms;
    outline: none;
    color: #ece750;
  }

  .dropbtn {

    font-size: 140%;
    border: none;
    cursor: pointer;
    font-weight: bold;
    background: url(../images/print.png);
    color: white;
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
    background-color:  #600a0a;
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgb(0, 0, 0, 0.2);
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
    background-color:  #600a0a
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color:  #600a0a;
  }
</style>

