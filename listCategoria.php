<?php
    include "../include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM categoria');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>categoria</th>";
        echo "  <th>descricao</th>";    
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";

        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['categoria']."</td>";
            echo "<td>".$value['descricao']."</td>";

            echo "<td><center><a href='altCategoria.php?id=".$value['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delCategoria.php?id=".$value['codigo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadProdutos.php'">

<h3><a href="principal.php">Tela Principal</a></h3>
