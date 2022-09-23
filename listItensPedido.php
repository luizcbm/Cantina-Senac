<?php
    include "include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM itenspedido');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>codItenspedido</th>";
        echo "  <th>codProduto</th>";
        echo "  <th>codPedido</th>";           
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";

        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codItensPedido']."</td>";
            echo "<td>".$value['codProduto']."</td>";
            echo "<td>".$value['codPedido']."</td>";

            echo "<td><center><a href='altItensPedido.php?id=".$value['codItensPedido']."'>(+)</a></center></td>";
            echo "<td><center><a href='delItensPedido.php?id=".$value['codItensPedido']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadItenspedido.php'">

<h3><a href="principal.php">Tela Principal</a></h3>
