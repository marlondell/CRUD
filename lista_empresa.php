<!-- Essa página exibe a relação de empresas, sejam clientes, fabricantes, operadoras de telefonia, prestadores de serviço -->
<?php  include_once("includes.php");
 

   //Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }



layout_saida_empresa();



?>
