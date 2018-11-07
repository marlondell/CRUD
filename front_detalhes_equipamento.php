<!-- Essa página é invocada quando algum equipamento é selecionado na listagem -->
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

    if (isset($_GET["altera_equipamento"])){

        $codigo_equipamento = $_GET["altera_equipamento"];
        $dados_equipamento = get_equipments_full($codigo_equipamento);

        layout_altera_equipamento($dados_equipamento);
    }

?>


