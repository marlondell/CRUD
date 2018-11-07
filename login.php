<?php require_once("../../conexao/conexao_dashboard_funcao.php"); ?>
<?php

//Inicializa variáveis de sessão.

session_start();

        
// Caso tenha algo vindo do formulário, ele trata as informações.

if ((isset ( $_POST["user"])) && (isset ( $_POST["password"]))){
    $user = $_POST["user"];
    $password = $_POST["password"];
    $conecta = connect();
    $query_login = "SELECT * FROM usuarios WHERE login = '{$user}' AND senha = '{$password}';";
    $dados_query_login = @$conecta->query($query_login);
        if(!$dados_query_login){
            die("Falha na consulta a tabela de login");
        }
        
//Se o login teve sucesso, ele retorna o array preenchido. Caso vazio, login sem sucesso.
        
    $resultado_consulta_login = mysqli_fetch_assoc($dados_query_login);
    if ( empty($resultado_consulta_login)) {
        $mensagem_erro = "Login sem sucesso";
    }else{
    // A variável de sessão é add aqui, após o sucesso do login, antes de chamar a próxima página.
        $_SESSION["user_portal"] = $resultado_consulta_login["codigo"];
        header("location:principal.php");
    }
}
?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <div id="login">

            <form action="login.php" method="post">
                <h2>Login</h2>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" id="user" type="text" name="user" placeholder="Usuário">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" id="user" type="password" name="password" placeholder="Senha"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success btn-block" name="acessar" value="acessar">Acessar</button>
                    </div>
                </div>
            </form>
            <!-- Caso tenha mensagem de erro, exibe -->
            <?php
            if ( isset ($mensagem_erro)) {
            ?>
            <p><?php echo $mensagem_erro ?></p>
            <?php
             }
            ?>
        </div>

    </body>
</html>
