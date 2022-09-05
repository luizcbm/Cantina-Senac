
<?php
include "site/include/MySql.php";
if ($_SESSION['nome'] = "") {
  

  $sql = $pdo->prepare('SELECT * FROM usuario WHERE codigo = '.$_SESSION['codigo']);
  $sql->execute();
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  $path = "data:image/jpg:charset=utf8;base64," . base64_encode($info[0]['imagem']);
?>
  <img width="100px" src="<?php echo $path; ?>">
  <h3><a href="listUsuario.php">Lista de Usuários</a></h3>
  
<?php } else { ?>
  <h1>Você não está logado!!</h1>
<?php } ?>