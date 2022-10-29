<?php
 
 // FAZER CONEXÃO COM BANCO E CONFERIR OS DADOS DO BANCO COM OS DE LOGIN

require_once('bancodedados.php');
$banco->verificaUsuario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    
    foreach($banco->users as $index => $value) { //recebe valor do usuario no index do foreach
        if($_POST['username'] == $banco->users[$index] and $_POST['password'] == $banco->password[$index]){
            $_SESSION['loggedin'] = TRUE;
            $_SESSION["username"] = $banco->users[$index];
            header("location: cadastro.php");
            break;
        } else {
            $_SESSION['loggedin'] = FALSE;
        }
    }
    
}


?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso ao sistema</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Faça seu login</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div> 
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>   
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>

