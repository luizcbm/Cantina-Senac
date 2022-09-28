<?php
    include_once "include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM Produtos');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>Codigo</th>";
        echo "  <th>nome</th>";    
        echo "  <th>descricao</th>";
        echo "  <th>valor</th>";
        echo "  <th>Imagem</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";

        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codigo']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td>".$value['valor']."</td>";
            $imagem = $value['imagem'];

            echo '<td><img style="width:80px;" src="data:image/jpg:charset=utf8;base64,'.base64_encode($imagem).'"></td>';
            echo "<td><center><a href='altProdutos.php?id=".$value['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delProdutos.php?id=".$value['codigo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadProdutos.php'">

<h3><a href="principal.php">Tela Principal</a></h3>
