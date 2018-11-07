<!-- Página Principal, ainda sem conteúdo 05/11/2018. Toda operação de banco retorna para cá.
<?php  include_once("includes.php");
 

   //Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }



layout_principal();



?>
