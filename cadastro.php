<?php

require_once('bancodedados.php');

$conexao  = new BancoDeDados();

if ($_SESSION['loggedin'] = FALSE){
    header("location: index.php");
}

if (isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['editora'])) {
    $livro = new BancoDeDados();
    $livro->inserirLivros($_POST['nome'], $_POST['autor'], $_POST['editora']);
}


?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Faça o cadastro do livro</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Título/Nome do Livro</label>
                <input type="text" name="nome" class="form-control" value=""> 
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" value=""> 
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Editora</label>
                <input type="text" name="editora" class="form-control" value=""> 
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>


    <br>  <br>
    <a href="logout.php" class="btn btn-danger">Sair da conta</a>
    <a href="livros.php" class="btn btn-success">Veja todos os livros cadastrados</a>
    
</body>
</html>