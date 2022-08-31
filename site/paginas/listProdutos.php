<?php
    include "../include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM produtos');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>Codigo</th>";
        echo "  <th>nome</th>";    
        echo "  <th>descricao</th>";
        echo "  <th>valor</th>";
        echo "  <th>Administrador</th>";
        echo "  <th>Imagem</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codigo']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td>".$value['valor']."</td>";
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
<input type="button" value="Cadastrar" onclick="parent.location='cadProdutos.php'">

<h3><a href="principal.php">Tela Principal</a></h3>