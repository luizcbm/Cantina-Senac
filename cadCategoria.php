<?php
include "../include/MySql.php";


$categoria = "";
$descricao = "";


$categoriaErro = "";
$descricaoErro = "";



    //if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    //if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
      //  $fileName = basename($_FILES['image']['name']);
      //  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas 
       // $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

       //if (in_array($fileType, $allowTypes)) {
           // $image = $_FILES['image']['tmp_name'];
           // $imgContent = file_get_contents($image);

            if (empty($_POST['categoria']))
                $categoriaErro = "categoria é obrigatório!";
            else
                $categoria = $_POST['categoria'];

            if (empty($_POST['descricao']))
                $descricaoErro = "descrição é obrigatório!";
            else
                $descricao = $_POST['descricao'];

            if ($nome_produto && $descricao && $valor) {
                //Verificar se ja existe o email
                        $sql = $pdo->prepare("INSERT INTO categoria( categoria, descricao,)
                                                VALUES (null, ?, ?,)");
                        if ($sql->execute(array($categoria, $descricao,))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $categoria = "";
                            $descricao = "";
                            header('location:listProdutos.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
            } else {
                $msgErro = "Dados não cadastrados!";
            }
     

?>
    <link rel="stylesheet" href="site/css/cadastro.css">

    <form method="POST" enctype="multipart/form-data">
        <div class="nav">
            <div class="h1">
                <legend>Cadastro de categorias</legend>
                
                <br>
            </div>
            <input type="text" placeholder="categoria" name="categoria" value="<?php echo $categoria ?>">
            <span class="obrigatorio">*<?php echo $categoriaErro ?></span>
            <br>
            <input type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao ?>">
            <span class="obrigatorio">*<?php echo $descricaoErro ?></span>
            <br>
    
            <div class="daora">
                <label class="custom-file-upload">
                    <input type="file" name="image">
                    Escolher arquivo
                </label>
            </div>
            <br>
            <br>
            <div class="button">
                <a href="login.php"><button type="submit" name="submit">Salvar</button></a>

            </div>
        </div>

    </form>
    <span><?php echo $msgErro ?></span>
