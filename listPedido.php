<?php
    include "include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM pedido');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>codPedido</th>";
        echo "  <th>idCliente</th>";
        echo "  <th>horario_abre</th>";    
        echo "  <th>horario_fecha</th>";        
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";

        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codPedido']."</td>";
            echo "<td>".$value['idCliente']."</td>";
            echo "<td>".$value['horario_abre']."</td>";
            echo "<td>".$value['horario_fecha']."</td>";

            echo "<td><center><a href='altPedido.php?id=".$value['codPedido']."'>(+)</a></center></td>";
            echo "<td><center><a href='delPedido.php?id=".$value['codPedido']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadPedido.php'">

<h3><a href="principal.php">Tela Principal</a></h3>
