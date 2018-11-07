<!-- Página de Inclusão. Os botões acionam formulários são carregados via Modal. As validações de registro duplicado são feitas nas PROCs do banco. -->
<?php require_once("includes.php"); ?>
<?php
//Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }
?>

<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Cadastro</title>
            <!-- <link href="_css/reset.css" rel="stylesheet"> -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
            
        </head>

        <body>

            <?php include_once("_incluir/topo_navegavel.php"); ?>
            <div id="distancia-topo"></div>
            
            <div class="btn-cadastro">
                <ul>
                    <li><a href="layout_cadastros.php?tipoC=1">Equipamento</a></li>
                    <li><a href="layout_cadastros.php?tipoC=2">Empresa</a></li>
                    <li><a href="layout_cadastros.php?tipoC=3">Link</a></li>
                </ul>
            </div>
            <div class="btn-cadastro">
                <ul>
                    <li><a href="layout_cadastros.php?tipoC=4">Departamento</a></li>
                    <li><a href="layout_cadastros.php?tipoC=5">Tipo Telefone</a></li>
                    <li><a href="layout_cadastros.php?tipoC=6">Tipo Empresa</a></li>                
                </ul>
            </div>
            <div class="btn-cadastro">
                <ul>
                    <li><a href="layout_cadastros.php?tipoC=7">Tipo Equipamento</a></li>
                    <li><a href="layout_cadastros.php?tipoC=8">Marca</a></li>
                    <li><a href="layout_cadastros.php?tipoC=11">Modelo</a></li>
                </ul>
            </div>
            <div class="btn-cadastro">
                <ul>
                    <li><a href="layout_cadastros.php?tipoC=9">Tipo Acesso Remoto</a></li>
                    <li><a href="layout_cadastros.php?tipoC=10">SO</a></li>
                </ul>
            </div>
            
            
            <!-- JavaScript do BootStrap -->
            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            
            
        </body>
        
</html>






