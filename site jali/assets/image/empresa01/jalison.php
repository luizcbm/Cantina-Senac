<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <?php
            include "head.php";
            ?>

            <div class="container">
                <h1>escreva algo que vc está em mente</h1>
            </div>
            <p>
                <strong>digite a abaixo:</strong>
                <dl>
                    <dd>
                        <textarea name="comentarios" cols="50" rows="5"></textarea>
                    </dd>
                </dl>
            </p>
            <p>
                <input type="submit" value="Enviar " name="Enviar">
                <input type="reset" value="excluir " name="Limpar">
            </p>

        </fieldset>
    </form>

    <?php
    include "footer.php";
    ?>


</body>

</html>