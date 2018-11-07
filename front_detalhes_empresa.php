<!-- Essa página é invocada quando alguma empresa é selecionado na listagem -->
<?php require_once("includes.php"); ?>

<?php
//Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }
?>

<!-- Recupera o código do equipamento via GET e invoca a função que exibe os detalhes -->
<?php

    if (isset($_GET["altera_empresa"])){

        $codigo_empresa = $_GET["altera_empresa"];
        $dados_empresa = get_enterprises_full($codigo_empresa);

        layout_altera_empresa($dados_empresa);
    }

?>



