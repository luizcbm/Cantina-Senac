
<?php
    include_once "MySql.php";
    include_once "head.php";

    $sql = $pdo->prepare('SELECT * FROM usuario');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

<<<<<<< HEAD
        echo "<table border='1'>";
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
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codigo']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['email']."</td>";
            echo "<td>".$value['telefone']."</td>";
            echo "<td>".$value['senha']."</td>";
            echo "<td>".$value['administrador']."</td>";
            $imagem = $value['imagem'];

            echo '<td><img style="width:80px;" src="data:image/jpg:charset=utf8;base64,'.base64_encode($imagem).'"></td>';
            echo "<td><center><a href='altUsuario.php?id=".$value['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delUsuario.php?id=".$value['codigo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadUsuario.php'">

<h3><a href="principal.php">Tela Principal</a></h3>
=======
<div class="container w-75 mx-auto p-5 bg-white">
    <?php
    include "paginas/listUsuario.php"
    ?>
</div>

<?php
include "footer.php"
?>
>>>>>>> 203bf6e0bc006b5f8568396e4de8619bf4c07f8e
