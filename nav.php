<nav class="bg hover-circulo">

  <div class="image">
    <img src="site/images/logosenac.png">
  </div>

  <h1>Olá <?php

          if (isset($_SESSION['nome'])) {
            echo $_SESSION['nome'];
          } else {
            echo  "Visitante";
          }


          ?>!!</h1>


  <style>
div button.dropbtn :focus,
div button.dropbtn :hover {
    transition: 1ms;
    outline: none;
    color: #ece750;
}

    .dropbtn{

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
      background-color: red;
      min-width: 160px;
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
      background-color: red;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
      background-color: red;
    } 
  </style>

  <div class="bun">
    <a href="index.php" title="Inicio">Inicio</a>
    <a href="contato.php" title="Contato">Contato</a>

    <a href="sobre.php" title="Sobre">Sobre</a>
    <div class="dropdown">
      <button class="dropbtn">Cardapio</button>

      <div class="dropdown-content">
        <a href="refri.html">Bebidas</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>
    <div class="logi">
    <?php
    if (!isset($_SESSION['nome'])) {

            echo '<a href="login.php" title="Logout">Login</a>';
          } else {
            
            echo '<a href="logout.php" title="Logout">Logout</a>';
          }?>
    </div>
  </div>
</nav>