<!-- Essa página exibe a relação dos cadastros de entidades menores como tipos de telefone, marcas, modelos de equipamentos, etc -->
<?php  include_once("includes.php");
 

   //Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }



display_saida_diversos();



?>


