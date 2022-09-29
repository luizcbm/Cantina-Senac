<?php
include_once "head.php";
include_once "include/MySql.php";
// funções
if (isset($_SESSION['codigo'])) {
  $sql = $pdo->prepare('SELECT * FROM USUARIO WHERE codigo = ' . $_SESSION['codigo']);
  if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    $path = "data:image/jpg:charset=utf8;base64," . base64_encode($info[0]['imagem']);
  } else {
    $info = "";
    $path = "";
  }
} else {
}

if (!isset($_SESSION['nome'])) {

  $link =  '<a href="login.php" title="Login" class="dropdown-item">Logar</a> ';
} else {

  $link =  '<a href="logout.php" title="Logout" class="dropdown-item">Sair</a>';
}





if (isset($_SESSION['nome'])) {
  $saudacao = "Olá " . $_SESSION['nome'];
} else {
  $saudacao = "Olá Visitante";
}

?>

<header class="p-3 border-bottom bg-black bg-gradient ">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center ml-lg-5 mr-lg-5 mb-2 mb-lg-0 text-dark text-decoration-none">
       </a>
       
    
     <a onClick="window.location.href=window.location.href"> <img src="assets/images/novalogo.png" class="img-fluid" style="max-height: 100px;"></a>
       <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 text-light">
        <li><a href="index.php" class="nav-link px-3 link-primary text-muted text-light">Inicio</a></li>
        <li><a href="sobre.php" class="nav-link px-3 link-primary text-muted text-light">Sobre</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 text-muted text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Cardápio</a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item text-muted text-light"  href="bebidas.php">Bebidas</a></li>
            <li><a class="dropdown-item text-muted text-light" href="salgados.php">Salgados</a></li>
            <li><a class="dropdown-item text-muted text-light" href="doces.php">Doces</a></li>
          </ul>
        </li>
       
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="busca.php">
        <input type="search" class="form-control" placeholder="Busca..." aria-label="Search">
      </form>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if (isset($_SESSION['codigo'])) : ?>
            <img class="rounded-circle" style="" alt="mdo" width="32" height="32" src="<?php echo $path; ?>">
          <?php else : ?>
            <img class="rounded-circle" alt="mdo" width="32" height="32" src="assets/images/visitante.png">
          <?php endif; ?>
          <!-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> -->
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
       <?php
        if (isset($_SESSION['administrador'])==1) {
 echo  '<li><a class="dropdown-item" href="altUsuario.php" >Editar perfil</a></li>
    <li><a class="dropdown-item" href="listUsuario.php">Usuarios</a></li>';
} else {
 echo  '<li><a class="dropdown-item"href="altUsuario.php">Editar perfil</a></li>';
}
?>
          
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><?php echo $link ?></li>
        </ul>
      </div>
    </div>
  </div>
</header>