<!-- Essa página é invocada quando algum item é selecionado na listagem da página de diversos (tipo de empresa, marca, modelo, etc -->
<?php require_once("includes.php"); ?>

<?php
//Teste de segurança
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }
?>

<!-- Recupera o código do tipo de empresa via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_tipo_empresa"])){


        $dados_tipo_empresa = get_tipo_empresa_alt($_GET["altera_tipo_empresa"]);
        layout_altera_tipo_empresa($dados_tipo_empresa);
    }
?>


<!-- Recupera o código do departamento via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_departamento"])){

        $dados_departamento = get_departamentos_alt($_GET["altera_departamento"]);
        layout_altera_departamento($dados_departamento);

    }
?>


<!-- Recupera o código do tipo de telefone via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_tipo_telefone"])){

        $dados_tipo_telefone = get_tipo_telefone_alt($_GET["altera_tipo_telefone"]);
        layout_altera_tipo_telefone($dados_tipo_telefone);
    }
?>


<!-- Recupera o código do tipo de equipamento via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_tipo_equipamento"])){

        $dados_tipo_equipamento = get_tipo_equipamento_alt($_GET["altera_tipo_equipamento"]);
        layout_altera_tipo_equipamento($dados_tipo_equipamento);
    }
?>


<!-- Recupera o código da marca via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_marca"])){

        $dados_marca = get_marca_alt($_GET["altera_marca"]);
        layout_altera_marca($dados_marca);
    }

?>


<!-- Recupera o código do tipo de acesso remoto via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_tipo_acesso_remoto"])){

        $dados_tipo_acesso_remoto = get_tipo_acesso_remoto_alt($_GET["altera_tipo_acesso_remoto"]);
        layout_altera_tipo_acesso_remoto($dados_tipo_acesso_remoto);
        
    }
?>


<!-- Recupera o código do sistema operacional via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_sistema_operacional"])){

        $dados_sistema_operacional = get_sistema_operacional_alt($_GET["altera_sistema_operacional"]);
        layout_altera_sistema_operacional($dados_sistema_operacional);
        
    }
?>


<!-- Recupera o código do modelo via GET e invoca a função que exibe o Modal de Alteração -->
<?php

    if (isset($_GET["altera_modelo"])){

        $dados_modelo = get_modelo_alt($_GET["altera_modelo"]);
        layout_altera_modelo($dados_modelo);
    }
?>




