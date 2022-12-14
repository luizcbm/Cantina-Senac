<?php
include_once "head.php";
include_once "include/MySql.php";
include_once "include/functions.php";


// $_SESSION['nome'] = "";
// $_SESSION['administrador'] = "";
// $_SESSION['codigo'] = "";

$email = "";
$emailErro = "";
$senha = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $emailErro = "Email é obrigatório";
    } else {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST['senha'])) {
        $senhaErro = "Senha é obrigatório";
    } else {
        $senha = test_input($_POST['senha']);
    }

    if ($email && $senha) {
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email=? AND senha=?");
        if ($sql->execute(array($email, MD5($senha)))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach ($info as $key => $values) {
                    $_SESSION['nome'] = $values['nome'];
                    $_SESSION['administrador'] = $values['administrador'];
                    $_SESSION['codigo'] = $values['codigo'];
                }
                //header('location:index.php');
                echo "<meta http-equiv='refresh' content='0;index.php'>";
            } else {
                $msgErro = "Usuário não cadastrado!";
            }
        } else {
            $msgErro = "Usuário não cadastrado!";
        }
    }
}
?>

<div class="container fundo">
    <div class="bolo">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="h1">
                <img style="width: 169px ;" src="./assets/images/chapéu.png">
                <legend>Entrar</legend>
                <br>
            </div>
            <label for="email"></label>
            <input type="text" placeholder="Email" name="email" value="<?php echo $email ?>">
            <br>
            <label for="senha"></label>
            <input type="password" placeholder="Senha" name="senha" value="<?php echo $senha ?>">
            <br>
            <div class="bola">
                <br>
                <input type="submit" value="Login" name="login">
            </div>
            <div class="enzo">
                <a class="cad" href="cadUsuario.php">Cadastrar</a>
            </div>
        </form>
        <span><?php echo $msgErro ?></span>
    </div>
</div>

<?php
include "footer.php";
?>