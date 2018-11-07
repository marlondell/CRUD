<!-- Arquivo que contém as funções correspondentes ao layout do front -->




<?php
function layout_saida_equipamento()   {
?>    

    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
            <title>Consulta Equipamentos</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
        </head>

        <body>

            <!-- Cabeçalho da página --> 
            <?php include_once("_incluir/topo_navegavel.php"); ?>

            <div id="distancia-topo"></div> 

            <div class="container col-lg-12">
                <div class="row justify-content-around">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Equipamentos
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                           $equipto_array = get_equipments();
                                           display_equipments($equipto_array);
                                        ?>                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

        </body>
    </html>

<?php
}
?>




<?php
function layout_saida_empresa()   {
?>    

    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
            <title>Consulta Empresas</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
        </head>

        <body>

            <!-- Cabeçalho da página --> 
            <?php include_once("_incluir/topo_navegavel.php"); ?>

            <div id="distancia-topo"></div> 
            <div class="container col-lg-12">
                <div class="row justify-content-around text-center">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria- controls="collapseFour">
                                            Fabricantes
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                            $enterprise_array = get_enterprises_manufacturer();
                                            display_enterprises($enterprise_array);

                                        ?>                    
                                    </div>
                                </div>
                            </div>                


                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Clientes Revenda
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                            $enterprise_array = get_enterprises_client();
                                            display_enterprises($enterprise_array);
                                        ?>                    
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Operadoras Telefonia
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                            $enterprise_array = get_enterprises_telephone_operator();
                                            display_enterprises($enterprise_array);
                                        ?>                    
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            Prestadores de Serviço
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                            $enterprise_array = get_enterprises_service_provider();
                                            display_enterprises($enterprise_array);
                                        ?>                    
                                    </div>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

        </body>
    </html>

<?php
}
?>




<?php
function layout_saida_link()   {
?>    

    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
            <title>Cosulta Links</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
        </head>

        <body>

            <!-- Cabeçalho da página --> 
            <?php include_once("_incluir/topo_navegavel.php"); ?>

            <div id="distancia-topo"></div> 

            <div class="container col-lg-12">
                <div class="row justify-content-around">
                    <div class="col-lg-12">

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Links
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                        <?php 
                                            $link_array = get_links();
                                            display_links($link_array);
                                        ?>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

        </body>
    </html>

<?php
}
?>




<?php
function display_saida_diversos()   {
?>


    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
            <title>Consulta Diversos</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
        </head>

        <body>

            <!-- Cabeçalho da página --> 
            <?php include_once("_incluir/topo_navegavel.php"); ?>

            <div id="distancia-topo"></div> 

            <div class="container col-lg-12">
                <div class="row justify-content-around">

                    <div class="col-lg-12"> 


                        <div class="accordion" id="accordionExample">
                            <!-- Primeiro Accordion -->
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-light btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Tipos de Empresa - Departamentos - Tipos de Telefone
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row justify-content-center mt-lg-2 mb-lg-4">
                                            <div class="col-lg-12">
                                                <div class="card-deck">
                                                    <!-- card 1 -->
                                                    <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                        <div class="card-header">
                                                            <h5>Tipos Empresa</h5>
                                                        </div>
                                                        <div class="card-body">

                                                            <!-- Div para controlar o Scroll da Tabela -->
                                                            <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                <?php
                                                                    $tipo_empresa_array = get_tipo_empresa();
                                                                    display_tipo_empresa($tipo_empresa_array);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- card 2 -->
                                                    <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                        <div class="card-header">
                                                            <h5>Departamentos</h5>
                                                        </div>
                                                        <div class="card-body">

                                                            <!-- Div para controlar o Scroll da Tabela -->
                                                            <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                <?php
                                                                    $departamento_array = get_departamento();
                                                                    display_departamento($departamento_array);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- card 3 -->
                                                    <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                        <div class="card-header">
                                                            <h5>Tipos Telefone</h5>
                                                        </div>
                                                        <div class="card-body">

                                                            <!-- Div para controlar o Scroll da Tabela -->
                                                            <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                <?php
                                                                    $tipo_telefone_array = get_tipo_telefone();
                                                                    display_tipo_telefone($tipo_telefone_array);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Segundo Accordion -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-light btn-lg btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Tipo Equipamento  -  Marca  -  Tipo Acesso Remoto
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row justify-content-center mt-lg-2 mb-lg-4">
                                                <div class="col">
                                                    <div class="card-deck">
                                                        <!-- card 4 -->
                                                        <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                            <div class="card-header">
                                                                <h5>Tipos Equipamento</h5>
                                                            </div>
                                                            <div class="card-body">

                                                                <!-- Div para controlar o Scroll da Tabela -->
                                                                <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                    <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                    <?php
                                                                        $tipo_equipamento_array = get_tipo_equipamento();
                                                                        display_tipo_equipamento($tipo_equipamento_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- card 5 -->                        
                                                        <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                            <div class="card-header">
                                                                <h5>Marcas</h5>
                                                            </div>
                                                            <div class="card-body">

                                                                <!-- Div para controlar o Scroll da Tabela -->
                                                                <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                    <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                    <?php
                                                                        $marca_array = get_marca();
                                                                        display_marca($marca_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- card 6 -->                       
                                                        <div class="card text-center bg-light" style="max-width: 26rem; max-height: 18rem;">
                                                            <div class="card-header">
                                                                <h5>Tipos Acesso Remoto</h5>
                                                            </div>
                                                            <div class="card-body">

                                                                <!-- Div para controlar o Scroll da Tabela -->
                                                                <div style="overflow: auto; width: 23rem; height: 12rem;">
                                                                    <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                    <?php
                                                                        $tipo_acesso_remoto_array = get_tipo_acesso_remoto();
                                                                        display_tipo_acesso_remoto($tipo_acesso_remoto_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Terceiro Accordion -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-light btn-lg btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Sistemas Operacionais  -  Modelos de Equipamentos
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row justify-content-center mt-lg-2 mb-lg-4">
                                                <div class="col">
                                                    <div class="card-deck">
                                                        <!-- card 7 -->
                                                        <div class="card text-center bg-light" style="max-width: 40rem; max-height: 18rem;">
                                                            <div class="card-header">
                                                                <h5>Sistema Op. / Firmware</h5>
                                                            </div>
                                                            <div class="card-body">

                                                                <!-- Div para controlar o Scroll da Tabela -->
                                                                <div style="overflow: auto; width: 37rem; height: 12rem;">
                                                                    <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                    <?php
                                                                        $sistema_operacional_array = get_sistema_operacional();
                                                                        display_sistema_operacional($sistema_operacional_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- card 8 -->
                                                        <div class="card text-center bg-light" style="max-width: 40rem; max-height: 18rem;">
                                                            <div class="card-header">
                                                                <h5>Modelos Equipamentos</h5>
                                                            </div>
                                                            <div class="card-body">

                                                                <!-- Div para controlar o Scroll da Tabela -->
                                                                <div style="overflow: auto; width: 37rem; height: 12rem;">
                                                                    <!-- essas funções provém de listagens.php e saidas.php. Montam o conteúdo do banco enquadrado nas tags HTML -->
                                                                    <?php
                                                                        $modelo_array = get_modelo();
                                                                        display_modelo($modelo_array);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    

            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

        </body>
    </html>

<?php
}
?>




<?php
function layout_principal() {
?>


    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
            <title>Principal</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="_css/estilo_dashboard.css" rel="stylesheet">
        </head>

        <body>

            <!-- Cabeçalho da página --> 
            <?php include_once("_incluir/topo_navegavel.php"); ?>


            <div id="distancia-topo"></div> 

            <div class="container col-lg-12">
                <div class="row justify-content-around">
                    <div class="col-lg-12">

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Página Principal
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body text-center bg-light">
                                        <h4>Em construção</h4>
                                        <h4>Acesse pelo menu</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>



<?php
}
?>
