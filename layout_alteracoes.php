<!-- Este arquivo traz o Layout para realizar alterações nos cadastros -->




<?php

function layout_altera_equipamento($dados_equipamento)    {

    // Variáveis contendo as consultas usadas em Combo Box
    $lista_tipo_equipamento = get_list_equipment_type();
    $lista_modelo_equipamento = get_list_equipment_model();
    $lista_empresa = get_list_client(); 
    $lista_departamento = get_list_department();
    $lista_fornecedor = get_list_provider();
    $lista_sistema = get_list_system_operation();
    $lista_cliente = get_list_client();
    $lista_tipo_acesso_remoto = get_list_access_remote_type();

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Equipamentos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <!-- Cabeçalho da página --> 
        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para exibir detalhes do equipamento -->                   
        <div class="modal fade" id="modalExibeEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg font-weight-light" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes Equipamento</h5>
                    </div>
                    <div class="modal-body">

                        <?php  display_equipments_full($dados_equipamento); ?>

                        <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                        <div class="modal-footer">
                            <a href="lista_equipamento.php" class="card-link">
                                <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                            </a>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalAlteraEquipamento" data-dismiss="modal">Altera</button>
                            <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao">Exclui</button>

                            <!-- Modal para confirmar a exclusão do equipamento. Botão sim submete o Formulário. Botão Não volta para o Modal de detalhes do equipamento -->
                            <div class="modal fade" id="confirma_exclusao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao" aria-hidden="true">
                                <div class="modal-dialog text-center bg-info"  role="document">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="label_confirma_exclusao">Atenção</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Confirma Exclusão?</h6>
                                            <form action="back_altera_proc.php" method="post">
                                                <input type="text" name="cad" value="8" hidden>   
                                                <input type="text" class="form-control" name="equipto_codigo" id="equipto_codigo" value="<?php echo $dados_equipamento["codigo"] ?>" hidden>       
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                    <a href="front_detalhes_equipamento.php?altera_equipamento=<?php echo $dados_equipamento["codigo"]; ?>" class="card-link">
                                                        <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                    </a>    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                 
        </div>       

        <!-- Modal Para Alteração de Equipamento-->
        <div class="modal fade" id="modalAlteraEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg font-weight-light" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Altera Equipamento</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário com os dados recuperados para serem alterados -->
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="8" hidden>   
                            <input type="text" class="form-control" name="equipto_codigo" id="equipto_codigo" value="<?php echo $dados_equipamento["codigo"] ?>" hidden>
                            <!-- Primeira linha -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-9">
                                        <select class="form-control" id="equipto_modelo" name="equipto_modelo" required>
                                            <option label="" value="<?php echo $dados_equipamento["cod_modelo"] ?>">
                                                <?php echo $dados_equipamento["desc_tipo"] . "&nbsp;&nbsp" . 
                                                $dados_equipamento["desc_marca"] . "&nbsp;&nbsp" .    
                                                $dados_equipamento["desc_modelo"]; ?>
                                            </option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_modelo_equipamento = mysqli_fetch_assoc($lista_modelo_equipamento)) {
                                            ?>
                                                    <option value="<?php echo $linha_modelo_equipamento["cod_modelo"]; ?>">
                                                        <?php echo $linha_modelo_equipamento["desc_tipo"] . "&nbsp;&nbsp" . 
                                                        $linha_modelo_equipamento["desc_marca"] . "&nbsp;&nbsp" . 
                                                        $linha_modelo_equipamento["desc_modelo"]; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_num_serie" type="text" name="equipto_num_serie" maxlength="30" value="<?php echo $dados_equipamento["num_serie"]; ?>"  placeholder="Número Série">
                                    </div>

                                </div>
                            </div>

                            <!-- Segunda linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <select class="form-control" id="equipto_empresa" name="equipto_empresa" required>
                                            <option label="" value="<?php echo $dados_equipamento["cod_emp"]; ?>"><?php echo $dados_equipamento["cliente"] . " " . $dados_equipamento["unidade"]; ?>
                                            </option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_empresa = mysqli_fetch_assoc($lista_empresa)) {
                                            ?>
                                            <option value="<?php echo $linha_empresa["codigo"]; ?>"><?php echo $linha_empresa["razao_social"] . " " . $linha_empresa["unidade"]; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3" >
                                        <select class="form-control" id="equipto_depto" name="equipto_depto" required>
                                            <option label="" value="<?php echo $dados_equipamento["cod_depto"]; ?>"><?php echo $dados_equipamento["desc_departamento"]; ?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_departamento = mysqli_fetch_assoc($lista_departamento)) {
                                            ?>
                                            <option value="<?php echo $linha_departamento["codigo"]; ?>"><?php echo $linha_departamento["desc_departamento"]; ?>
                                            </option>
                                            <?php
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3" >
                                        <input class="form-control" id="equipto_descricao" type="text" name="equipto_descricao" maxlength="30" value="<?php echo $dados_equipamento["descricao"]; ?>" placeholder="Descrição Equipto">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3" >
                                        <input class="form-control" id="equipto_hostname" type="text" name="equipto_hostname" maxlength="30" value="<?php echo $dados_equipamento["hostname"]; ?>" placeholder="Hostname">
                                    </div>
                                </div>
                            </div>

                            <!-- Terceira linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_mac" type="text" name="equipto_mac" maxlength="30" value="<?php echo $dados_equipamento["mac"]; ?>" placeholder="MAC">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_ip" type="text" name="equipto_ip" maxlength="40" value="<?php echo $dados_equipamento["numero_ip"]; ?>" placeholder="IP">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">    
                                        <select class="form-control" id="equipto_tipo_ip" name="equipto_tipo_ip" required>
                                            <option label="" value="<?php echo $dados_equipamento["tipo_ip"]; ?>"><?php echo $dados_equipamento["tipo_ip"]; ?>
                                            </option>
                                            <option label=""></option>
                                            <option value="DINÂMICO"> Dinâmico</option>
                                            <option value="ESTÁTICO"> Estático</option>                    
                                        </select>
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_porta" type="text" name="equipto_porta" maxlength="10" value="<?php echo $dados_equipamento["pt_equipto"]; ?>"  placeholder="Porta">
                                    </div>
                                </div>
                            </div>
                            <!-- Quarta linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_usuario" type="text" name="equipto_usuario" maxlength="30" value="<?php echo $dados_equipamento["usuario"]; ?>" placeholder="Usuário">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_login" type="text" name="equipto_login" maxlength="30" value="<?php echo $dados_equipamento["login_so"]; ?>" placeholder="Login S.O.">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_senha" type="text" name="equipto_senha" maxlength="30" value="<?php echo $dados_equipamento["senha_so"]; ?>" placeholder="Senha">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_nivel_acesso" type="text" name="equipto_nivel_acesso" maxlength="30" value="<?php echo $dados_equipamento["nivel"]; ?>" placeholder="Nível Acesso">
                                    </div>
                                </div>
                            </div>
                            <!-- Quinta linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <select class="form-control" id="equipto_tipo_acesso_remoto" name="equipto_tipo_acesso_remoto">
                                            <option label="" value="<?php echo $dados_equipamento["cod_tipo_acesso_remoto"]; ?>"><?php echo $dados_equipamento["desc_tipo_acesso_remoto"]; ?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_tipo_acesso_remoto = mysqli_fetch_assoc($lista_tipo_acesso_remoto)) {
                                            ?>
                                            <option value="<?php echo $linha_tipo_acesso_remoto["codigo"]; ?>"><?php echo $linha_tipo_acesso_remoto["desc_tipo_acesso_remoto"]; ?></option>
                                            <?php
                                               }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <input class="form-control" id="equipto_end_acesso_remoto" type="text" name="equipto_end_acesso_remoto" maxlength="40" value="<?php echo $dados_equipamento["endereco"]; ?>" placeholder="Endereço">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-2">
                                        <input class="form-control" id="equipto_login_acesso_remoto" type="text" name="equipto_login_acesso_remoto" maxlength="30" value="<?php echo $dados_equipamento["login"]; ?>" placeholder="Login">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-2">
                                        <input class="form-control" id="equipto_senha_acesso_remoto" type="text" name="equipto_senha_acesso_remoto" maxlength="30" value="<?php echo $dados_equipamento["senha"]; ?>" placeholder="Senha">
                                    </div>
                                    <!-- Quinta coluna -->
                                    <div class="col-lg-2">
                                        <input class="form-control" id="equipto_porta_acesso_remoto" type="text" name="equipto_porta_acesso_remoto" maxlength="10" value="<?php echo $dados_equipamento["porta"]; ?>" placeholder="Porta">
                                    </div>
                                </div>
                            </div>
                            <!-- Sexta linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-4">
                                        <select class="form-control" name="equipto_sist" id="equipto_sist">
                                            <option label="" value="<?php echo $dados_equipamento["cod_sist"]; ?>"><?php echo $dados_equipamento["desc_sist"] . " " . $dados_equipamento["versao_sist"]; ?> </option>
                                            <option label="Sistema Operacional"></option>
                                            <?php
                                                while ( $linha_sistema = mysqli_fetch_assoc($lista_sistema)) {
                                            ?>
                                            <option value="<?php echo $linha_sistema["codigo"]; ?>"><?php echo $linha_sistema["desc_sist"] . " " . $linha_sistema["versao_sist"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-4">

                                        <input class="form-control" type="text" name="equipto_id_sist" id="equipto_id_sist" maxlength="60" value="<?php echo $dados_equipamento["id"]; ?>" placeholder="ID Sistema">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-4">
                                        <input class="form-control" type="text" name="equipto_key_sist" id="equipto_key_sist" maxlength="60" value="<?php echo $dados_equipamento["licenca"]; ?>" placeholder="Product Key">
                                    </div>
                                </div>
                            </div>
                            <!-- Sétima linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" rows="3" id="equipto_observacoes" name="equipto_observacoes" maxlength="5000" value="<?php echo $dados_equipamento["observacoes"]; ?>"><?php echo $dados_equipamento["observacoes"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Botão volta, exibe novamente o Modal com os detalhes do equipamento. Altera exibe modal de confirmação -->
                            <div class="modal-footer">
                                <a href="front_detalhes_equipamento.php?altera_equipamento=<?php echo $dados_equipamento["codigo"]; ?>" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-target="#confirma_alteracao">Altera</button>

                                <!-- Modal para confirmação de alteração da equipamento. Os botões: Sim = submete o formulário. Não, recerrega os detalhes do equipamento. -->   
                                <div class="modal fade" id="confirma_alteracao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao" aria-hidden="true">
                                    <div class="modal-dialog text-center bg-info"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_detalhes_equipamento.php?altera_equipamento=<?php echo $dados_equipamento["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#modalExibeEquipamento").modal("show");
        </script>

    </body>
</html>

<?php
}
?>




<?php

function layout_altera_empresa($dados_empresa)   {

    
    $lista_tipo_empresa = get_list_enterprise_type();
    $lista_tipo_telefone1 = get_list_type_phone();
    $lista_tipo_telefone2 = get_list_type_phone();
    $lista_tipo_telefone3 = get_list_type_phone();
    $telefone = array (array (null, null, null, null, null),
                       array (null, null, null, null, null),
                       array (null, null, null, null, null));
    
    $lista_telefone = get_telefones_empresa($dados_empresa["codigo"]);
    $linha = 0;
  
    // varre a tabela de telefones e recupera os registros dos telefones cadastrados para esta empresa
    while ( $linha_telefone = mysqli_fetch_array($lista_telefone))  {
        for ($coluna = 0; $coluna < 5; $coluna++)   {
            $telefone[$linha][$coluna] = $linha_telefone[$coluna];
        }
        $linha++;
    }
    
?>  


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Empresa</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para exibir detalhes da empresa -->                   
        <div class="modal fade" id="modalExibeEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg font-weight-light" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes Empresa</h5>
                    </div>
                    <div class="modal-body">

                        <?php display_enterprises_full($dados_empresa); ?>

                        <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                        <div class="modal-footer">
                            <a href="lista_empresa.php" class="card-link">
                                <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                            </a>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalAlteraEmpresa" data-dismiss="modal">Altera</button>
                            <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao">Exclui</button>

                            <!-- Modal para confirmar exclusão. Caso não confirme, volta a exibir o cadastro full -->
                            <div class="modal fade" id="confirma_exclusao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao" aria-hidden="true">
                                <div class="modal-dialog text-center bg-info"  role="document">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="label_confirma_exclusao">Atenção</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Confirma Exclusão?</h6>
                                            <form action="back_altera_proc.php" method="post">
                                                <input type="text" name="cad" value="2" hidden>   
                                                <input type="text" class="form-control" name="empresa_codigo" id="empresa_codigo"  value="<?php echo  $dados_empresa["codigo"]?>" hidden>  

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                    <a href="front_detalhes_empresa.php?altera_empresa=<?php echo $dados_empresa["codigo"]; ?>" class="card-link">
                                                        <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                    </a>    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                 
        </div>       

        <!-- Modal para Alteração de Empresa-->
        <div class="modal fade" id="modalAlteraEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alteração de Empresa</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário com os dados recuperados para serem alterados -->
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="2" hidden>   
                            <input type="text" class="form-control" name="empresa_codigo" id="empresa_codigo"  value="<?php echo  $dados_empresa["codigo"]?>" hidden>
                            <!-- Primeira linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <label for="tipo"><h6>Tipo</h6></label>
                                        <select class="form-control" id="tipo" name="tipo" >
                                            <option label="" value="<?php echo  $dados_empresa["cod_tipo_empresa"]?>"><?php echo  $dados_empresa["desc_tipo"]?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_tipo_empresa = mysqli_fetch_assoc($lista_tipo_empresa)) {
                                            ?>
                                            <option value="<?php echo $linha_tipo_empresa["codigo"]; ?>"><?php echo $linha_tipo_empresa["desc_tipo"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <label for="cnpj"><h6>Cnpj</h6></label>
                                        <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="20" value="<?php echo  $dados_empresa["cnpj"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <label for="razaosocial"><h6>Razão Social</h6></label>
                                        <input type="text" class="form-control" id="razaosocial" name="razaosocial" maxlength="50" value="<?php echo  $dados_empresa["razao_social"]?>">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <label for="unidade"><h6>Unidade</h6></label>
                                        <input type="text" class="form-control" id="unidade" name="unidade" maxlength="30" value="<?php echo  $dados_empresa["unidade"]?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Segunda linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-6">
                                        <label for="endereco"><h6>Endereço</h6></label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" maxlength="50" value="<?php echo  $dados_empresa["endereco"]?>">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <label for="numero"><h6>Número</h6></label>
                                        <input type="text" class="form-control" id="numero" name="numero" maxlength="10" value="<?php echo  $dados_empresa["numero"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <label for="complemento"><h6>Complemento</h6></label>
                                        <input type="text" class="form-control" id="complemento" name="complemento" maxlength="30" value="<?php echo  $dados_empresa["complemento"]?>"><br>
                                    </div>
                                </div>
                            </div>
                            <!-- Terceira linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <label for="bairro"><h6>Bairro</h6></label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50" value="<?php echo  $dados_empresa["bairro"]?>">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <label for="cidade"><h6>Cidade</h6></label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" maxlength="50" value="<?php echo  $dados_empresa["cidade"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <label for="estado"><h6>Estado</h6></label>
                                        <input type="text" class="form-control" id="estado" name="estado" maxlength="2" value="<?php echo  $dados_empresa["estado"]?>">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <label for="cep"><h6>CEP</h6></label>
                                        <input type="text" class="form-control" id="cep" name="cep" maxlength="10" value="<?php echo  $dados_empresa["cep"]?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Quarta linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-4">
                                        <label for="nome_contato"><h6>Contato</h6></label>
                                        <input type="text" class="form-control" id="nome_contato" name="nome_contato" maxlength="30" value="<?php echo  $dados_empresa["nome_contato"]?>">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-4">
                                        <label for="email_contato"><h6>e-m@il</h6></label>
                                        <input type=email class="form-control" id="email_contato" name="email_contato" maxlength="50" value="<?php echo  $dados_empresa["email_contato"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-4">
                                        <label for="site"><h6>Web</h6></label>
                                        <input type="text" class="form-control" id="site" name="site" maxlength="50" value="<?php echo  $dados_empresa["site"]?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Quinta linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-2">
                                        <input type="text" id="codigo_telefone1" name="codigo_telefone1" value="<?php echo $telefone[0][0];?>" hidden>
                                        <label for="numero_telefone1"><h6>Telefone</h6></label>
                                        <input type="text" class="form-control" id="numero_telefone1" name="numero_telefone1" maxlength="20" value="<?php echo $telefone[0][1];?>" placeholder="">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-2">
                                        <label for="tipo_telefone1"><h6>Setor</h6></label>
                                        <select name="tipo_telefone1" id="tipo_telefone1" class="form-control">
                                            <option value="<?php echo $telefone[0][3];?>"><?php echo $telefone[0][4];?></option>
                                            <option label=""></option>
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
                                        <input type="text" id="codigo_telefone2" name="codigo_telefone2" value="<?php echo $telefone[1][0];?>" hidden>
                                        <label for="numero_telefone2"><h6>Telefone</h6></label>
                                        <input type="text" class="form-control" id="numero_telefone2" name="numero_telefone2" maxlength="20" value="<?php echo $telefone[1][1];?>" placeholder="">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-2"> 
                                        <label for="tipo_telefone2"><h6>Setor</h6></label>
                                        <select name="tipo_telefone2" id="tipo_telefone2" class="form-control">
                                            <option value="<?php echo $telefone[1][3];?>"><?php echo $telefone[1][4];?></option>
                                            <option label=""></option>
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
                                        <input type="text" id="codigo_telefone3" name="codigo_telefone3" value="<?php echo $telefone[2][0];?>" hidden>
                                        <label for="numero_telefone3"><h6>Telefone</h6></label>
                                        <input type="text" class="form-control" id="numero_telefone3" name="numero_telefone3" maxlength="20" value="<?php echo $telefone[2][1];?>" placeholder="">
                                    </div>
                                    <!-- Sexta coluna -->
                                    <div class="col-lg-2">
                                        <label for="tipo_telefone3"><h6>Setor</h6></label>
                                        <select name="tipo_telefone3" id="tipo_telefone3" class="form-control">
                                            <option value="<?php echo $telefone[2][3];?>"><?php echo $telefone[2][4];?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_tipo_telefone3 = mysqli_fetch_assoc($lista_tipo_telefone3)) {
                                            ?>
                                            <option value="<?php echo $linha_tipo_telefone3["codigo"]; ?>"><?php echo $linha_tipo_telefone3["desc_tipo_telefone"]; ?></option>
                                            <?php
                                                                                                                           }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Botões -  VOLTA: lista as empresas  -  ALTERA: chama modal para confirmar alteração  -  EXCLUI:  - hama modal para confirmar exclusão -->       
                            <div class="modal-footer">
                                <a href="lista_empresa.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-target="#confirma_alteracao">Altera</button>

                                <!-- Modal para confirmação de alteração da empresa. Os botões: Sim = submete o formulário. Não, recerrega os detalhes da empresa. -->          
                                <div class="modal fade" id="confirma_alteracao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao" aria-hidden="true">
                                    <div class="modal-dialog text-center bg-info"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_detalhes_empresa.php?altera_empresa=<?php echo $dados_empresa["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal para confirmação de exclusão da empresa. Os botões: Sim = submete o formulário. Não, recerrega os detalhes da empresa. -->         
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
            $("#modalExibeEmpresa").modal("show");
        </script>

    </body>
</html>





<?php
}
?>



<?php

function layout_altera_link($dados_link)   {

    global $dados_link;
    $lista_operadora_telefonia = get_list_telephone_operator();
    $lista_cliente = get_list_client($dados_link);

?>    

<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Link</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <div id="distancia-topo"></div> 

        <!-- Modal para exibir detalhes do link -->                   
        <div class="modal fade" id="modalExibeLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg font-weight-light" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes link</h5>
                    </div>
                    <div class="modal-body">

                        <?php
                            display_links_full($dados_link);
                        ?>    

                        <br>
                        <br>

                        <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                        <div class="modal-footer">
                            <a href="lista_link.php" class="card-link">
                                <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                            </a>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalAlteraLink" data-dismiss="modal">Altera</button>
                            <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao">Exclui</button>

                            <!-- Modal para confirmação de exclusão do link. Os botões: Sim = submete o formulário. Não, recerrega os detalhes do link. -->         
                            <div class="modal fade" id="confirma_exclusao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao" aria-hidden="true">
                                <div class="modal-dialog text-center bg-info"  role="document">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="label_confirma_exclusao">Atenção</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Confirma Exclusão?</h6>
                                            <form action="back_altera_proc.php" method="post">
                                                <input type="text" name="cad" value="7" hidden>   
                                                <input type="text" class="form-control" name="link_codigo" id="link_codigo" value="<?php echo  $dados_link["codigo"]?>" hidden>  

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                    <a href="front_detalhes_link.php?altera_link=<?php echo $dados_link["codigo"]; ?>" class="card-link">
                                                        <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Para Alteração de Link-->
        <div class="modal fade" id="modalAlteraLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alteração de Link</h5>
                    </div>
                    <!-- Formulário com os dados recuperados para serem alterados -->
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="7" hidden>   
                            <input type="text" class="form-control" name="link_codigo" id="link_codigo" value="<?php echo  $dados_link["codigo"]?>" hidden>
                            <!-- Primeira linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_empresa"><h6>Contratante</h6></label>
                                        <select name="link_empresa" id="link_empresa" class="form-control">
                                            <option value="<?php echo  $dados_link["cod_cliente"]?>" ><?php echo  $dados_link["cliente"] . " " . $dados_link["unidade"]?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_cliente = mysqli_fetch_assoc($lista_cliente)) {
                                            ?>
                                            <option value="<?php echo $linha_cliente["codigo"]; ?>"><?php echo $linha_cliente["razao_social"] . " " . $linha_cliente["unidade"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">                    
                                        <label for="link_fornecedor"><h6>Operadora</h6></label>
                                        <select name="link_fornecedor" id="link_fornecedor" class="form-control">
                                            <option value="<?php echo  $dados_link["cod_operadora"]?>"><?php echo  $dados_link["operadora"]?></option>
                                            <option label=""></option>
                                            <?php
                                                while ( $linha_operadora_telefonia = mysqli_fetch_assoc($lista_operadora_telefonia)) {
                                            ?>
                                            <option value="<?php echo $linha_operadora_telefonia["codigo"]; ?>"><?php echo $linha_operadora_telefonia["razao_social"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3"> 
                                        <label for="link_tipo"><h6>Tipo</h6></label>
                                        <select name="link_tipo" id="link_tipo" class="form-control" required>
                                            <option value="<?php echo  $dados_link["tipo"]?>"><?php echo  $dados_link["tipo"]?></option>
                                            <option label=""></option>
                                            <option value="DINÂMICO"> Dinâmico </option>
                                            <option value="ESTÁTICO"> Estático </option>
                                            <option value="PPPoE"> PPPoE </option>
                                        </select>
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_velocidade"><h6>Contrato/Designação</h6></label>
                                        <input type="text" class="form-control" name="link_contrato" id="link_contrato" maxlength="20" value="<?php echo  $dados_link["contrato"]?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Segunda linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_velocidade"><h6>Velocidade</h6></label>
                                        <input type="text" class="form-control" name="link_velocidade" id="link_velocidade" maxlength="20" value="<?php echo  $dados_link["velocidade"]?>">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_ip"><h6>IP</h6></label>
                                        <input type="text" class="form-control" name="link_ip" id="link_ip" maxlength="40" value="<?php echo  $dados_link["ip"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_mascara"><h6>Máscara</h6></label>
                                        <input type="text" class="form-control" name="link_mascara" id="link_mascara" maxlength="40" value="<?php echo  $dados_link["mascara"]?>">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_gateway"><h6>Gateway</h6></label>
                                        <input type="text" class="form-control" name="link_gateway" id="link_gateway" maxlength="40" value="<?php echo  $dados_link["gateway"]?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Terceira linha do formulário -->
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <!-- Primeira coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_dns1"><h6>DNS 1</h6></label>
                                        <input type="text" class="form-control" name="link_dns1" id="link_dns1" maxlength="40" value="<?php echo  $dados_link["dns1"]?>">
                                    </div>
                                    <!-- Segunda coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_dns2"><h6>DNS 2</h6></label>
                                        <input type="text" class="form-control" name="link_dns2" id="link_dns2" maxlength="40" value="<?php echo  $dados_link["dns2"]?>">
                                    </div>
                                    <!-- Terceira coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_login"><h6>Login</h6></label>
                                        <input type="text" class="form-control" name="link_login" id="link_login" maxlength="30" value="<?php echo  $dados_link["login"]?>">
                                    </div>
                                    <!-- Quarta coluna -->
                                    <div class="col-lg-3">
                                        <label for="link_senha"><h6>Senha</h6></label>
                                        <input type="text" class="form-control" name="link_senha" id="link_senha" maxlength="30" value="<?php echo  $dados_link["senha"]?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_link.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-target="#confirma_alteracao">Altera</button>

                                <!-- Modal para confirmação de alteração do link. Os botões: Sim = submete o formulário. Não, recerrega os detalhes do link. -->
                                <div class="modal fade" id="confirma_alteracao" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao" aria-hidden="true">
                                    <div class="modal-dialog text-center bg-info"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_detalhes_link.php?altera_link=<?php echo $dados_link["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#modalExibeLink").modal("show");
        </script>

    </body>
</html>

<?php
}
?>


<?php
function layout_altera_tipo_empresa($dados_tipo_empresa)    {
    
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Tipo Empresa</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para tipo de empresa -->
        <div class="modal fade" id="tipo_empresa" tabindex="-1" role="dialog" aria-labelledby="label_tipo_empresa" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_tipo_empresa">Tipo de Empresa</h5>
                    </div>
                    <div class="modal-body">     
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="0" hidden>
                            <input type="text" name="tipo_empresa_codigo" value="<?php echo $dados_tipo_empresa["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="tipo_empresa"  name="tipo_empresa" maxlength="30" value="<?php echo $dados_tipo_empresa["desc_tipo"]; ?>">
                            <br>
                            <br>
                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-target="#confirma_alteracao_tipo_empresa">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_tipo_empresa">Exclui</button>

                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_tipo_empresa" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_tipo_empresa" aria-hidden="true">
                                    <div class="modal-dialog text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_tipo_empresa">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_empresa=<?php echo $dados_tipo_empresa["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_tipo_empresa" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_tipo_empresa" aria-hidden="true">
                                    <div class="modal-dialog text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_tipo_empresa">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_empresa=<?php echo $dados_tipo_empresa["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#tipo_empresa").modal("show");
        </script>

    </body>
</html>

<?php
}
?>




<?php
function layout_altera_departamento($dados_departamento)    {
    
?>


<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Departamento</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para departamento -->
        <div class="modal fade" id="departamento" tabindex="-1" role="dialog" aria-labelledby="label_departamento" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_departamento">Departamento</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="3" hidden>
                            <input type="text" name="departamento_codigo" value="<?php echo $dados_departamento["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="departamento"  name="departamento" maxlength="30" value="<?php echo $dados_departamento["desc_departamento"]; ?>">
                            <br>
                            <br>

                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#departamento" data-target="#confirma_alteracao_depto">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_depto">Exclui</button>
                                
                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_depto" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_depto" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_depto">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_departamento=<?php echo $dados_departamento["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_depto" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_depto" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">    
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_depto">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_departamento=<?php echo $dados_departamento["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>  
                                </div>
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
            $("#departamento").modal("show");
        </script>
    
    </body>
</html>

<?php
}
?>





<?php
function layout_altera_tipo_telefone($dados_tipo_telefone)    {
    
?>

        
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Tipo Telefone</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para tipo de telefone -->
        <div class="modal fade" id="tipo_telefone" tabindex="-1" role="dialog" aria-labelledby="label_tipo_telefone" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_tipo_telefone">Tipo de Telefone</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="9" hidden>
                            <input type="text" name="tipo_telefone_codigo" value="<?php echo $dados_tipo_telefone["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="tipo_telefone"  name="tipo_telefone" maxlength="20" value="<?php echo $dados_tipo_telefone["desc_tipo_telefone"]; ?>">
                            <br>
                            <br>
                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#tipo_telefone" data-target="#confirma_alteracao_tipo_telefone">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_tipo_telefone">Exclui</button>

                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_tipo_telefone" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_tipo_telefone" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_tipo_telefone">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_telefone=<?php echo $dados_tipo_telefone["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_tipo_telefone" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_tipo_telefone" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_tipo_telefone">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_telefone=<?php echo $dados_tipo_telefone["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#tipo_telefone").modal("show");
        </script>
        
    </body>
    
</html>

<?php
}
?>







<?php
function layout_altera_tipo_equipamento($dados_tipo_equipamento)    {
    
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Tipo Equipamento</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para tipo de equipamento -->
        <div class="modal fade" id="tipo_equipamento" tabindex="-1" role="dialog" aria-labelledby="label_tipo_equipamento" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_tipo_equipamento">Tipo de Equipamento</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="1" hidden>
                            <input type="text" name="tipo_equipamento_codigo" value="<?php echo $dados_tipo_equipamento["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="tipo_equipamento"  name="tipo_equipamento" maxlength="30" value="<?php echo $dados_tipo_equipamento["desc_tipo"]; ?>">
                            <br>
                            <br>
                            
                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <!-- Botão altera chama modal para confirmar alteração -->
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#tipo_equipamento" data-target="#confirma_alteracao_tipo_equipamento">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_tipo_equipamento">Exclui</button>

                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_tipo_equipamento" tabindex="-1" role="dialog" aria-  labelledby="label_confirma_alteracao_tipo_equipamento" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_tipo_equipamento">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_equipamento=<?php echo $dados_tipo_equipamento["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_tipo_equipamento" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_tipo_equipamento" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">    
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_tipo_equipamento">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_equipamento=<?php echo $dados_tipo_equipamento["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#tipo_equipamento").modal("show");
        </script>
        
    </body>
    
</html>

<?php
}
?>  
        



<?php
function layout_altera_marca($dados_marca)    {
    
?>

     
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Marca</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

<body>

    <?php include_once("_incluir/topo_navegavel.php"); ?>

    <!-- Modal para marca -->
    <div class="modal fade" id="marca" tabindex="-1" role="dialog" aria-labelledby="label_marca" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label_marca">Marca</h5>
                </div>
                <div class="modal-body">
                    <form action="back_altera_proc.php" method="post">
                        <input type="text" name="cad" value="4" hidden>
                        <input type="text" name="marca_codigo" value="<?php echo $dados_marca["codigo"]; ?>" hidden>
                        <br>
                        <input type="text" class="form-control" id="marca"  name="marca" maxlength="30" value="<?php echo $dados_marca["desc_marca"]; ?>">
                        <br>
                        <br>
                        
                        <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                        <div class="modal-footer">
                            <a href="lista_diversos.php" class="card-link">
                                <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                            </a>
                            <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#marca" data-target="#confirma_alteracao_marca">Altera</button>
                            <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_marca">Exclui</button>
                            
                            <!-- Modal para confirmar alteração -->
                            <div class="modal fade" id="confirma_alteracao_marca" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_marca" aria-hidden="true">
                                <div class="modal-dialog  text-center modal-sm"  role="document">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="label_confirma_alteracao_marca">Atenção</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Confirma Alteração?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                            <a href="front_altera_diversos.php?altera_marca=<?php echo $dados_marca["codigo"]; ?>" class="card-link">
                                                <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                            </a>    
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <!-- Modal para confirmar a exclusão -->
                            <div class="modal fade" id="confirma_exclusao_marca" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_marca" aria-hidden="true">
                                <div class="modal-dialog  text-center modal-sm"  role="document">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="label_confirma_exclusao_marca">Atenção</h5>
                                        </div>
                                        <div class="modal-body">    
                                            <h6>Confirma Exclusão?</h6>
                                        </div>                      
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                            <a href="front_altera_diversos.php?altera_marca=<?php echo $dados_marca["codigo"]; ?>" class="card-link">
                                                <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
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
        $("#marca").modal("show");
    </script>
    
    </body>
    
</html>

<?php
}
?>  






<?php
function layout_altera_tipo_acesso_remoto($dados_tipo_acesso_remoto)    {
    
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Tipo Acesso Remoto</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para tipo de acesso remoto -->
        <div class="modal fade" id="tipo_acesso_remoto" tabindex="-1" role="dialog" aria-labelledby="label_tipo_acesso_remoto" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_tipo_acesso_remoto">Tipo de Acesso Remoto</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="10" hidden>
                            <input type="text" name="tipo_acesso_remoto_codigo" value="<?php echo $dados_tipo_acesso_remoto["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="tipo_acesso_remoto"  name="tipo_acesso_remoto" maxlength="30" value="<?php echo $dados_tipo_acesso_remoto["desc_tipo_acesso_remoto"]; ?>">
                            <br>
                            <br>
                            
                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#tipo_acesso_remoto" data-target="#confirma_alteracao_tipo_acesso_remoto">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_tipo_acesso_remoto">Exclui</button>
                                
                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_tipo_acesso_remoto" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_tipo_acesso_remoto" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_tipo_acesso_remoto">Atenção</h5>
                                            </div>  
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_acesso_remoto=<?php echo $dados_tipo_acesso_remoto["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_tipo_acesso_remoto" tabindex="-1" role="dialog" aria- labelledby="label_confirma_exclusao_tipo_acesso_remoto" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_tipo_acesso_remoto">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_tipo_acesso_remoto=<?php echo $dados_tipo_acesso_remoto["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#tipo_acesso_remoto").modal("show");
        </script>
        
    </body>
    
</html>

<?php
}
?>




<?php
function layout_altera_sistema_operacional($dados_sistema_operacional)    {
    
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Sistema Operacional</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para sistema operacional -->
        <div class="modal fade" id="sistema_operacional" tabindex="-1" role="dialog" aria-labelledby="label_sistema_operacional" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_sistema_operacional">Sistema</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="6" hidden>
                            <input type="text" name="sist_codigo" value="<?php echo $dados_sistema_operacional["codigo"]; ?>" hidden>
                            <br>
                            <input type="text" class="form-control" id="desc_sist"  name="desc_sist" maxlength="50" value="<?php echo $dados_sistema_operacional["desc_sist"]; ?>">
                            <input type="text" class="form-control" id="versao_sist"  name="versao_sist" maxlength="30" value="<?php echo $dados_sistema_operacional["versao_sist"]; ?>">
                            <br>

                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#sistema_operacional" data-target="#confirma_alteracao_sistema_operacional">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_sistema_operacional">Exclui</button>
                                
                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_sistema_operacional" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_sistema_operacional" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_sistema_operacional">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_sistema_operacional=<?php echo $dados_sistema_operacional["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_sistema_operacional" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_sistema_operacional" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_sistema_operacional">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_sistema_operacional=<?php echo $dados_sistema_operacional["codigo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#sistema_operacional").modal("show");
        </script>
    </body>
</html>

<?php
}
?>



<?php
function layout_altera_modelo($dados_modelo)    {

    $lista_tipo_equipamento = get_list_equipment_type();
    $lista_marcas = get_list_mark();
    
?>

        
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Altera Modelo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("_incluir/topo_navegavel.php"); ?>

        <!-- Modal para modelo -->
        <div class="modal fade" id="modelo" tabindex="-1" role="dialog" aria-labelledby="label_modelo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_modelo">Modelo</h5>
                    </div>
                    <div class="modal-body">
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="5" hidden>
                            <input type="text" name="modelo_codigo" value="<?php echo $dados_modelo["cod_modelo"]; ?>" hidden>
                            <input type="text" name="cod_marca" value="<?php echo $dados_modelo["cod_marca"]; ?>" hidden>
                            <br>
                            <select  class="form-control" name="cod_tp_equipamento" required >
                                <option value="<?php echo $dados_modelo["cod_tp_equipamento"]; ?>" ><?php echo $dados_modelo["desc_tipo"]; ?></option>
                                <option></option>
                                <?php
                                    while ( $linha_tipo_equipamento = mysqli_fetch_assoc($lista_tipo_equipamento)) {
                                ?>
                                <option value="<?php echo $linha_tipo_equipamento["codigo"]; ?>"><?php echo $linha_tipo_equipamento["desc_tipo"]; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <select  class="form-control" name="cod_marca" required >
                                <option value="<?php echo $dados_modelo["cod_marca"]; ?>" ><?php echo $dados_modelo["desc_marca"]; ?></option>
                                <option></option>
                                <?php
                                    while ( $linha_marca = mysqli_fetch_assoc($lista_marcas)) {
                                ?>
                                <option value="<?php echo $linha_marca["codigo"]; ?>"><?php echo $linha_marca["desc_marca"]; ?></option>
                                <?php
                                    }
                                ?>
                            </select>

                            <input type="text" class="form-control" id="modelo"  name="modelo" maxlength="30" value="<?php echo $dados_modelo["desc_modelo"]; ?>">
                            <br>

                            <!-- Botões do Modal. VOLTA: Carrega a lista novamente.  ALTERA: Invoca o modal de alteração. EXCLUI: Invoca o modal de exclusão. -->
                            <div class="modal-footer">
                                <a href="lista_diversos.php" class="card-link">
                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Volta</button>
                                </a>
                                <button type="button" class="btn btn-outline-warning" name="altera" value="altera" data-toggle="modal" data-dismiss="#,odelo" data-target="#confirma_alteracao_modelo">Altera</button>
                                <button type="button" class="btn btn-outline-danger" name="exclui" value="exclui" data-toggle="modal" data-target="#confirma_exclusao_modelo">Exclui</button>
                                
                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_modelo" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_modelo" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_modelo">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_modelo=<?php echo $dados_modelo["cod_modelo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para confirmar a exclusão -->
                                <div class="modal fade" id="confirma_exclusao_modelo" tabindex="-1" role="dialog" aria-labelledby="label_confirma_exclusao_modelo" aria-hidden="true">
                                    <div class="modal-dialog  text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_exclusao_modelo">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Exclusão?</h6>
                                            </div>                  
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="exclui" value="exclui"> Sim </button>
                                                <a href="front_altera_diversos.php?altera_modelo=<?php echo $dados_modelo["cod_modelo"]; ?>" class="card-link">
                                                    <button type="button" class="btn btn-outline-info" name="#" value="#">Não</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $("#modelo").modal("show");
        </script>
        
    </body>
    
</html>

<?php
}
?>
