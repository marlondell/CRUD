<!-- Este arquivo traz o Layout para realizar alterações nos cadastros -->
<?php require_once("includes.php"); ?>

<!-- Caso chegue o parâmetro do cadastro via GET, chama a função correspondente pelo case -->
<?php

if (isset ($_GET["tipoC"])) {

    $tipoCadastro = $_GET["tipoC"];

    switch ($tipoCadastro)  {

        case 1:

            layout_cadastra_equipamento();
            break;

        case 2:

            layout_cadastra_empresa();
            break;

        case 3:

            layout_cadastra_link();
            break;

        case 4:

            layout_cadastra_departamento();
            break;

        case 5:

            layout_cadastra_tipo_de_telefone();
            break;

        case 6:

            layout_cadastra_tipo_de_empresa();
            break;

        case 7:

            layout_cadastra_tipo_de_equipamento();
            break;

        case 8:

            layout_cadastra_marca() ;
            break;

        case 9:

            layoutCadastraTipoAcessoRemoto();
            break;

        case 10:

            layoutCadastraSO();
            break;

        case 11:

            layoutCadastraModelo();
            break;

        default:

            echo("Tipo de cadastro não encontrado. Entre em contato com o suporte");
        
}
    }else{

    echo("Tipo de cadastro não encontrado. Entre em contato com o suporte");

}
 
?>

<?php

function layout_cadastra_equipamento()    {

    // Variáveis contendo as consultas usadas em Combo Box
    $lista_modelo_equipamento = get_list_equipment_model();
    $lista_empresa = get_list_client();
    $lista_departamento = get_list_department();
    $lista_sistema = get_list_system_operation();
    $lista_cliente = get_list_client();
    $lista_tipo_acesso_remoto = get_list_access_remote_type();

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

        
                    <!-- Modal - Cadastra Equipamento -->
            <div class="modal fade" id="modalCadastraEquipamento" tabindex="-1" role="dialog" aria-labelledby="modalCadastraEquipamentoLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraEquipamentoLabel">Equipamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="8" hidden>   
                                <!-- Primeira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-9">
                                            <select class="form-control" name="equipto_modelo" required >
                                                <?php
                                                    while ( $linha_modelo_equipamento = mysqli_fetch_assoc($lista_modelo_equipamento)) {
                                                ?>
                                                <option value="<?php echo $linha_modelo_equipamento["cod_modelo"]; ?>">
                                                    <?php echo $linha_modelo_equipamento["desc_tipo"] . "&nbsp;&nbsp" . $linha_modelo_equipamento["desc_marca"] . "&nbsp;&nbsp" . $linha_modelo_equipamento["desc_modelo"]; ?>
                                                </option>
                                                <?php
                                                                                                                                       }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_num_serie" maxlength="30" placeholder="Núm. Série">
                                        </div>
                                    </div>
                                </div>
                                <!-- Segunda linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-3">
                                            <select class="form-control" name="equipto_empresa" required >

                                                <?php
                                                while ( $linha_empresa = mysqli_fetch_assoc($lista_empresa)) {
                                                ?>
                                                <option value="<?php echo $linha_empresa["codigo"]; ?>">
                                                    <?php echo $linha_empresa["razao_social"] . " " . $linha_empresa["unidade"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-3" >
                                            <select class="form-control" name="equipto_depto" required >
                                                <?php
                                                    while ( $linha_departamento = mysqli_fetch_assoc($lista_departamento)) {
                                                ?>
                                                <option value="<?php echo $linha_departamento["codigo"]; ?>">
                                                    <?php echo $linha_departamento["desc_departamento"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Terceira Coluna -->
                                        <div class="col-lg-3" >
                                            <input class="form-control" type="text" name="equipto_descricao"  maxlength="30" placeholder="Descrição Equipto">
                                        </div>
                                        <!-- Quarta Coluna -->
                                        <div class="col-lg-3" >
                                            <input class="form-control" type="text" name="equipto_hostname" maxlength="30" placeholder="Hostname">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Terceira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_mac" maxlength="30" placeholder="Mac Address">
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-3">    
                                            <input class="form-control" type="text" name="equipto_ip" maxlength="40" placeholder="IP">
                                        </div>
                                        <!-- Terceira Coluna -->
                                        <div class="col-lg-3">    
                                            <select class="form-control" name="equipto_tipo_ip" >
                                                <option value="DINÂMICO" selected> Dinâmico</option>
                                                <option value="ESTÁTICO"> Estático</option>                    
                                            </select>
                                        </div>
                                        <!-- Quarta Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_porta" maxlength="10" placeholder="Porta">
                                        </div>
                                    </div>
                                </div>
                                <!-- Quarta linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_usuario" maxlength="30" placeholder="Usuário">
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_login" maxlength="30" placeholder="Login">
                                        </div>
                                        <!-- Terceira Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_senha" maxlength="30" placeholder="Senha">
                                        </div>
                                        <!-- Quarta Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_nivel_acesso" maxlength="30" placeholder="Nível Acesso">
                                        </div>
                                    </div>
                                </div>
                                <!-- Quinta linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-3">
                                            <select class="form-control" name="equipto_tipo_acesso_remoto">
                                                <?php
                                                    while ( $linha_tipo_acesso_remoto = mysqli_fetch_assoc($lista_tipo_acesso_remoto)) {
                                                ?>
                                                <option value="<?php echo $linha_tipo_acesso_remoto["codigo"]; ?>">
                                                    <?php echo $linha_tipo_acesso_remoto["desc_tipo_acesso_remoto"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="equipto_end_acesso_remoto" maxlength="40" placeholder="Endereço">
                                        </div>
                                        <!-- Terceira Coluna -->
                                        <div class="col-lg-2">
                                            <input class="form-control" type="text" name='equipto_login_acesso_remoto' maxlength="30" placeholder="Login">
                                        </div>
                                        <!-- Quarta Coluna -->
                                        <div class="col-lg-2">
                                            <input class="form-control" type="text" name="equipto_senha_acesso_remoto" maxlength="30" placeholder="Senha">
                                        </div>
                                        <!-- Quinta Coluna -->
                                        <div class="col-lg-2">
                                            <input class="form-control" type="text" name="equipto_porta_acesso_remoto" maxlength="10" placeholder="porta">
                                        </div>
                                    </div>
                                </div>
                                <!-- Sexta linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira Coluna -->
                                        <div class="col-lg-4">
                                            <select class="form-control" name="equipto_sist">
                                                <?php
                                                    while ( $linha_sistema = mysqli_fetch_assoc($lista_sistema)) {
                                                ?>
                                                <option value="<?php echo $linha_sistema["codigo"]; ?>">
                                                    <?php echo $linha_sistema["desc_sist"] . " " .  $linha_sistema["versao_sist"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda Coluna -->
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" name="equipto_id_sist" maxlength="60" placeholder="ID Sistema">
                                        </div>
                                        <!-- Terceira Coluna -->
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" name="equipto_key_sist" maxlength="60" placeholder="Product Key">
                                        </div>
                                    </div>
                                </div>
                                <!-- Setima linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <div class="col-lg-10">
                                            <textarea class="form-control" rows="3" name="equipto_observacoes" maxlength="5000" placeholder="Observações"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           

        
        
        <!-- JavaScript do BootStrap -->
            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        
        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraEquipamento").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layout_cadastra_empresa()    {

    // Variáveis contendo as consultas usadas em Combo Box
    $lista_tipo_empresa = get_list_enterprise_type();
    $lista_tipo_telefone1 = get_list_type_phone();
    $lista_tipo_telefone2 = get_list_type_phone();
    $lista_tipo_telefone3 = get_list_type_phone();
    $lista_estado = get_list_state();
        
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

                    <!-- Modal1 - Cadastra Empresa -->
            <div class="modal fade" id="modalCadastraEmpresa" tabindex="-1" role="dialog" aria-labelledby="modalCadastraEmpresaLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraEmpresaLabel1">Empresas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="2" hidden>  
                                <!-- Primeira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-3">
                                            <select class="form-control" name="tipo" required >
                                                <?php
                                                    while ( $linha_tipo_empresa = mysqli_fetch_assoc($lista_tipo_empresa)) {
                                                ?>
                                                <option value="<?php echo $linha_tipo_empresa["codigo"]; ?>">
                                                    <?php echo $linha_tipo_empresa["desc_tipo"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="cnpj" maxlength="20" placeholder="CNPJ">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="razaosocial" maxlength="50" placeholder="Razão Social" required>
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="unidade" maxlength="30" placeholder="unidade">
                                        </div>
                                    </div>
                                </div>
                                <!-- Segunda linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="endereco" maxlength="30" placeholder="Endereço" required>
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="numero" maxlength="10" placeholder="Número">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="complemento" maxlength="30" placeholder="Complemento"><br>
                                        </div>
                                    </div>
                                </div>
                                <!-- Terceira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="bairro" maxlength="50" placeholder="Bairro">
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="cidade" maxlength="50" placeholder="Cidade">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">
                                            <select class="form-control" name="estado" maxlength="2" required >
                                                <option label="SP" value="25">SP</option>
                                                <?php
                                                    while ( $linha_estado = mysqli_fetch_assoc($lista_estado)) {
                                                ?>
                                                <option value="<?php echo $linha_estado["uf"]; ?>">
                                                    <?php echo $linha_estado["estado"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="cep" maxlength="10" placeholder="CEP">
                                        </div>
                                    </div>
                                </div>
                                <!-- Quarta linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="nome_contato" maxlength="30" placeholder="Contato">
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-4">
                                            <input type=email class="form-control" name="email_contato" maxlength="50" placeholder="e-mail">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="site" maxlength="50" placeholder="site">
                                        </div>
                                    </div>
                                </div>
                                <!-- Quinta linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-2">
                                            <input type="text" class="form-control" name="numero_telefone1" maxlength="20" placeholder="Número telefone" required >
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-2">
                                            <select name="tipo_telefone1" class="form-control" required >
                                                <?php
                                                    while ( $linha_tipo_telefone1 = mysqli_fetch_assoc($lista_tipo_telefone1)) {
                                                ?>
                                                <option value="<?php echo $linha_tipo_telefone1["codigo"]; ?>"><?php echo $linha_tipo_telefone1["desc_tipo_telefone"]; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-2">
                                            <input type="text" class="form-control" name="numero_telefone2" maxlength="20" placeholder="Número telefone">
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-2">
                                            <select name="tipo_telefone2" class="form-control">
                                                <option label="Setor"></option>
                                                <?php
                                                    while ( $linha_tipo_telefone2 = mysqli_fetch_assoc($lista_tipo_telefone2)) {
                                                ?>
                                                <option value="<?php echo $linha_tipo_telefone2["codigo"]; ?>"><?php echo $linha_tipo_telefone2["desc_tipo_telefone"]; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Quinta coluna -->
                                        <div class="col-lg-2">
                                            <input type="text" class="form-control" name="numero_telefone3" maxlength="20" placeholder="Número telefone">
                                        </div>
                                        <!-- Sexta coluna -->
                                        <div class="col-lg-2">
                                            <select name="tipo_telefone3" class="form-control">
                                                <option label="Setor"></option>
                                                <?php
                                                    while ( $linha_tipo_telefone3 = mysqli_fetch_assoc($lista_tipo_telefone3)) {
                                                ?>
                                                <option value="<?php echo $linha_tipo_telefone3["codigo"]; ?>">
                                                    <?php echo $linha_tipo_telefone3["desc_tipo_telefone"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>                   

        <!-- JavaScript do BootStrap -->
            <script src="js/jquery-slim.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        
        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraEmpresa").modal("show");
        </script>

    </body>
</html>
    
<?php
}
?>




<?php
function layout_cadastra_link()    {

    // Variáveis contendo as consultas usadas em Combo Box
    $lista_cliente = get_list_client();
    $lista_operadora_telefonia = get_list_telephone_operator();
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal2 - Cadastra Link-->
            <div class="modal fade" id="modalCadastraLink" tabindex="-1" role="dialog" aria-labelledby="modalCadastraLinkLabel2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraLinkLabel2">Link</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">  
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="7" hidden>
                                <!-- Primeira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-3">
                                            <select name="link_empresa" class="form-control">
                                                <?php
                                                    while ( $linha_cliente = mysqli_fetch_assoc($lista_cliente)) {
                                                ?>
                                                <option value="<?php echo $linha_cliente["codigo"]; ?>">
                                                    <?php echo $linha_cliente["razao_social"] . " " . $linha_cliente["unidade"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">                    
                                            <select name="link_fornecedor" class="form-control">
                                                <?php
                                                while ( $linha_operadora_telefonia = mysqli_fetch_assoc($lista_operadora_telefonia)) {
                                                ?>
                                                <option value="<?php echo $linha_operadora_telefonia["codigo"]; ?>">
                                                    <?php echo $linha_operadora_telefonia["razao_social"]; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">                    
                                            <select name="link_tipo" class="form-control">
                                                <option value="DINÂMICO"> Dinâmico </option>
                                                <option value="ESTÁTICO"> Estático </option>
                                                <option value="PPPoE"> PPPoE </option>
                                            </select>
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_contrato" maxlength="20" placeholder="Contrato / Designação">
                                        </div>
                                    </div>
                                </div>
                                <!-- Segunda linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_velocidade" maxlength="20" placeholder="Velocidade">
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_ip" maxlength="40" placeholder="IP">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_mascara" maxlength="40" placeholder="Máscara">
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_gateway" maxlength="40" placeholder="Gateway">
                                        </div>
                                    </div>
                                </div>
                                <!-- Terceira linha -->
                                <div class="form-group col-lg-12">
                                    <div class="form-row">
                                        <!-- Primeira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_dns1" maxlength="40" placeholder="DNS Primário">
                                        </div>
                                        <!-- Segunda coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_dns2" maxlength="40" placeholder="DNS Secundário">
                                        </div>
                                        <!-- Terceira coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_login" maxlength="30" placeholder="Login (se houver)">
                                        </div>
                                        <!-- Quarta coluna -->
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="link_senha" maxlength="30" placeholder="Senha (se houver)">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <!-- Botões para fechar modal ou Submeter o formulário -->
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraLink").modal("show");
        </script>

    </body>
</html>
    
<?php
}
?>




<?php
function layout_cadastra_departamento()    {

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal3 - Cadastra Departamento-->
            <div class="modal fade" id="modalCadastraDepartamento" tabindex="-1" role="dialog" aria-labelledby="modalCadastraDepartamentoLabel3" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraDepartamentoLabel3">Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="3" hidden>
                                <input type="text" class="form-control" name="departamento" maxlength="30" placeholder="Departamento" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraDepartamento").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layout_cadastra_tipo_de_telefone()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal4 - Cadastra Tipo de Telefone-->
            <div class="modal fade" id="modalCadastraTipoTelefone" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTipoTelefoneLabel4" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraTipoTelefoneLabel4">Tipo de Telefone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="9" hidden>
                                <input type="text" class="form-control" name="tipo_telefone" maxlength="30" placeholder="Tipo de Telefone" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraTipoTelefone").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layout_cadastra_tipo_de_empresa()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal5 - Cadastra Tipo de Empresa -->
            <div class="modal fade" id="modalCadastraTipoEmpresa" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTipoEmpresaLabel5" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraTipoEmpresaLabel5">Tipo de Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="0" hidden>
                                <input type="text" class="form-control" name="tipo_empresa" maxlength="30" placeholder="Tipo de Empresa" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraTipoEmpresa").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layout_cadastra_tipo_de_equipamento()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal6 - Cadastra Tipo de Equipamento -->
            <div class="modal fade" id="modalCadastraTipoEquipamento" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTipoEquipamentoLabel6" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraTipoEquipamentoLabel6">Tipos de Equipamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="1" hidden>
                                <input type="text" class="form-control" name="tipo_equipamento" maxlength="30" placeholder="Tipo de Equipamento" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraTipoEquipamento").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layout_cadastra_marca()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal7 - Cadastra Marcas -->
            <div class="modal fade" id="modalCadastraMarca" tabindex="-1" role="dialog" aria-labelledby="modalCadastraMarcaLabel7" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraMarcaLabel7">Marcas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="4" hidden>
                                <input type="text" class="form-control" name="marca" maxlength="30" placeholder="Marca" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraMarca").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layoutCadastraTipoAcessoRemoto()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal8 - Cadastra Tipo de Acesso Remoto -->
            <div class="modal fade" id="modalCadastraTipoAcessoRemoto" tabindex="-1" role="dialog" aria-labelledby="modalCadastraTipoAcessoRemotoLabel8" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraTipoAcessoRemotoLabel8">Tipo Acesso Remoto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="10" hidden>
                                <input type="text" class="form-control" name="tipo_acesso_remoto" maxlength="30" placeholder="Tipo Acesso Rem"  required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraTipoAcessoRemoto").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layoutCadastraSO()    {

?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal9 - Cadastra SIstema Operacionalou Firmware -->
            <div class="modal fade" id="modalCadastraSO" tabindex="-1" role="dialog" aria-labelledby="modalCadastraSOLabel9" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraSOLabel9">Sistema Operacional ou Firmware</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="6" hidden>
                                <input type="text" class="form-control" name="desc_sist" maxlength="50" placeholder="S.O." required>
                                <input type="text" class="form-control" name="versao_sist" maxlength="30" placeholder="Versão" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraSO").modal("show");
        </script>

    </body>
</html>

<?php
}
?>



<?php
function layoutCadastraModelo()    {
                                    
    // Variáveis contendo as consultas usadas em Combo Box                                
    $lista_marcas = get_list_mark();
    $lista_tipo_equipamento = get_list_equipment_type();                                
?>    


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

            <!-- Modal10 - Cadastra Modelo de Equipamento -->
            <div class="modal fade" id="modalCadastraModelo" tabindex="-1" role="dialog" aria-labelledby="modalCadastraModeloLabel10" aria-hidden="true">
                <div class="modal-dialog modal-sm"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCadastraModeloLabel10">Modelo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                       
                            <!-- Formulário de Cadastro no corpo do Modal -->
                            <form action="back_cadastro_proc.php" method="post">
                                <input type="text" name="cad" value="1" hidden>
                                <select  class="form-control" name="equipto_tipo" required >
                                    <?php
                                        while ( $linha_tipo_equipamento = mysqli_fetch_assoc($lista_tipo_equipamento)) {
                                    ?>
                                    <option value="<?php echo $linha_tipo_equipamento["codigo"]; ?>">
                                        <?php echo $linha_tipo_equipamento["desc_tipo"]; ?>
                                    </option>
                                    <?php
                                        }
                                    ?>
                                </select> 
                                <select name="cod_marca" class="form-control">
                                    <?php
                                        while ( $linha_marca = mysqli_fetch_assoc($lista_marcas)) {
                                    ?>
                                    <option value="<?php echo $linha_marca["codigo"]; ?>">
                                        <?php echo $linha_marca["desc_marca"]; ?>
                                    </option>
                                    <?php
                                        }
                                    ?>
                                </select>       
                                <input type="text" class="form-control" name="modelo" maxlength="30" placeholder="Modelo Equipamento" required>
                                <!-- Botões para fechar modal ou Submeter o formulário -->
                                <div class="modal-footer">
                                    <a href="front_cadastro.php">
                                        <button type="button" class="btn btn-outline-secondary">Fecha</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success pull-right" >Envia</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div>
            </div> 
        <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Carrega o Modal quando a função é invocada -->
        <script type="text/javascript">
            $("#modalCadastraModelo").modal("show");
        </script>

    </body>
</html>

<?php
}
?>


