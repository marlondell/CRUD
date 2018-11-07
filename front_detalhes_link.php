<!-- Essa página é invocada quando algum link é selecionado na listagem -->
<?php require_once("includes.php"); ?>

<?php
//Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }
?>

<!-- Recupera o código do link via GET e invoca a função que exibe os detalhes -->
<?php

    if (isset($_GET["altera_link"])){

        $codigo_link = $_GET["altera_link"];
        $dados_link = get_links_full($codigo_link);

        layout_altera_link($dados_link);
    
    }
?>

