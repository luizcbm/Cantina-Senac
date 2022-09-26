<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/salgados.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="./assets/css/principal.css"> -->
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <link rel="stylesheet" href="./assets/css/lista.css">
    <link rel="stylesheet" href="./assets/css/cadastro.css">
    <link rel="stylesheet" href="./assets/css/alterar.css">
    <link rel="stylesheet" href="/assets/css/cadProdutos.css">
    <!-- <link rel="stylesheet" href="./assets/css/footer.css"> -->
    <!-- <link rel="stylesheet" href="./assets/css/carrousel.css"> -->
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/novo.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script> -->
    <script src="assets/js/index.js"></script>
    <title>Cantina Senac</title>

</head>
<?php
$pagina = "fundologin"
// fazer uma fução php -> Verificar qual a pagina vc esta.
// if(login){
//  $pagina = "fundoLogin"
// } else if (cadastro){
//     $pagina = "fundocadastro"
// }

?>

<body id="<?php echo $pagina ?>">



    <?php
    include_once "nav.php";
    ?>