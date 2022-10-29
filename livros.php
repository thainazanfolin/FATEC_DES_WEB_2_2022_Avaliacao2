<?php
session_start();

//verificando a sessão

if ($_SESSION['loggedin'] == FALSE) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Cadastrados</title>
</head>
<body>
<h1> Livros cadastrados </h1>
    

</body>
</html>

<?php

require_once('bancodedados.php');

$banco->mostraLivros();

?>

<br> <br>

<a href="logout.php" class="btn btn-danger">Sair da conta</a>




