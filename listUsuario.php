<?php
include_once "head.php";
include_once "include/MySql.php";

?>
<div class="container fundo">
    <div class="list">
        <img src="./assets/images/chapéu.png">
        <h1>USUARIOS</h1>
        <?php
        if ($_SESSION['administrador'] == 1) {
            echo "Olá Administrador!!";

            $sql = $pdo->prepare('SELECT * FROM USUARIO');
            if ($sql->execute()) {
                $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                echo "<table border='7'>";
                echo "<tr>";
                echo "  <th>Código</th>";
                echo "  <th>Nome</th>";
                echo "  <th>Email</th>";
                echo "  <th>Telefone</th>";
                echo "  <th>Senha</th>";
                echo "  <th>Administrador</th>";
                echo "  <th>Imagem</th>";
                echo "  <th>Alterar</th>";
                echo "  <th>Excluir</th>";
                echo "</tr>";
                foreach ($info as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value['codigo'] . "</td>";
                    echo "<td>" . $value['nome'] . "</td>";
                    echo "<td>" . $value['email'] . "</td>";
                    echo "<td>" . $value['telefone'] . "</td>";
                    echo "<td>" . $value['senha'] . "</td>";
                    echo "<td>" . $value['administrador'] . "</td>";
                    $imagem = $value['imagem'];

                    echo '<td><img style="width: 80px;" src="data:image/jpg:charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
                    echo "<td><center><a href='altUsuario.php?id=" . $value['codigo'] . "'>(+)</a></center></td>";
                    echo "<td><center><a href='delUsuario.php?id=" . $value['codigo'] . "'>(-)</a></center></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            die("Erro!! Você não é um administrador.");
        }
        ?>

        <br>
       <input type="button" value="Cadastrar" onclick="parent.location='cadUsuario.php'">

        <h3><a href="index.php">Tela Principal</a></h3>

    </div>
</div>
<?php
include "footer.php"
?>