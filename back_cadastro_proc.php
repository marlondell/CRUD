<!-- Programa responsável por realizar inserções no Banco de Dados. As inserções são feitas por entidade-->
<?php require_once("../../conexao/conexao_dashboard.php"); ?>



<!-- Teste de segurança. Se a variável de sessão não estiver carregada com o usuário, remete à página de login. -->
 <?php
    session_start();
    if ( !isset ($_SESSION["user_portal"])){
            header("location:login.php");
        }
?>   


<!--  Recebe via POST o código da entidade e as demais informações. Cada Formulário no Front envia um código que vai identificar o tipo de cadastro. Esse código será usado em um switch-case para chamar as procs correspondentes do banco -->
<?php
    if ( !isset ($_POST["cad"])) {
        echo "retornar para a página inicial";
    }else{
        //Variável para usar no pop-up de retorno da operação
        $tipo_operacao = "Cadastro";
        
        /*  0 tipo_empresa, 1 tipo_equipto, 2 empresa, 3 depto, 4 marca, 5 modelo, 6 so, 7 link, 8 equipto,
            9 tipo_telefone, 10 tipo_acesso_remoto, 11 senha_usuario */
        $tipo_cadastro = $_POST["cad"];
        switch ($tipo_cadastro){
                        
            case "0":
                        
                // Variável para usar na chamada da PROC
                $tipo_empresa = $_POST["tipo_empresa"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_TIPO_EMPRESA ('$tipo_empresa', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Tipo de Empresa ");
                }

                //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
                        
            case "1":
                        
                // Variável para usar na chamada da PROC
                $tipo_equipto = $_POST["tipo_equipamento"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_TIPO_EQUIPAMENTO ('$tipo_equipto', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Tipo de Equipamento ");
                }

                //Recupera mensagem de retorno da PROC para enviar ao usuário
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            case "2":
                
                // Variáveis para usar na chamada da PROC
                $tipo_empresa = $_POST["tipo"];
                $cnpj = $_POST["cnpj"];
                $razaosocial = $_POST["razaosocial"];
                $unidade = $_POST["unidade"];
                $endereco = $_POST["endereco"];
                $numero = $_POST["numero"];
                $complemento = $_POST["complemento"];
                $bairro = $_POST["bairro"];
                $cidade = $_POST["cidade"];
                $estado = $_POST["estado"];
                $cep = $_POST["cep"];
                $nome_contato = $_POST["nome_contato"];
                $email_contato = $_POST["email_contato"];
                $site = $_POST["site"];

                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_EMPRESA ('$tipo_empresa', '$cnpj', '$razaosocial', '$unidade', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$nome_contato', '$email_contato', '$site', @msg, @cod_empresa);";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Empresa ");
                }

                // Recupera Mensagem de retorno da PROC
                $query_retorno = "SELECT @msg;";                        
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                // Se a PROC retornar essa mensagem, significa que não passou na validação que protege contra duplicidade. Não inseriu e informa o usuário que a empresa já existe.
                if ($msg[0] == 'Empresa já existe'){

                    break;

                }else{


                //Recupera o último ID para usar no cadastro do telefone
                $query_retorno = "SELECT @cod_empresa;";
                $retorno = mysqli_query($conecta, $query_retorno);
                $codigo_empresa = mysqli_fetch_array($retorno);


                //faz um loop para gravar os telefones
                $cont = 1;
                while ($cont <= 3)  {
                    // Verifica se chega via POST informação sobre telefones.
                    if ($_POST["numero_telefone" . $cont])  {
                        $tipo_telefone = $_POST["tipo_telefone" . $cont];
                        $numero_telefone = $_POST["numero_telefone" . $cont];

                        // Monta String do comando da PROC 
                        $inserir = "CALL PROC_INSERE_TELEFONE ('$tipo_telefone', '$numero_telefone', '$codigo_empresa[0]');";
                        
                        //Executa a PROC e valida o comando
                        $grava_bd = mysqli_query($conecta, $inserir);
                        if ( !$grava_bd ) {
                            die("Erro ao tentar gravar telefone");
                        }

                    }
                    $cont ++;    
                }

                }

                break;
                        
                        
            case "3":
                        
                // Variável para usar na chamada da PROC
                $departamento = $_POST["departamento"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_DEPATAMENTO ('$departamento', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Departamento ");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            case "4":
                
                // Variável para usar na chamada da PROC
                $marca = $_POST["marca"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_MARCA ('$marca', @msg);";
                $query_retorno = "SELECT @msg;";
                
                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Marca ");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            case "5":
                
                // Variáveis para usar na chamada da PROC
                $modelo = $_POST["modelo"];
                $cod_marca = $_POST["cod_marca"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_MODELO ('$modelo', '$cod_marca', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Modelo ");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            case "6":
                        
                // Variáveis para usar na chamada da PROC
                $desc_sist = $_POST["desc_sist"];
                $versao_sist = $_POST["versao_sist"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_SISTEMA_OPERACIONAL ('$desc_sist', '$versao_sist', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Sistema Operacional ");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
                        
            case "7":
                
                // Variáveis para usar na chamada da PROC
                $link_empresa = $_POST["link_empresa"];
                $link_fornecedor = $_POST["link_fornecedor"];
                $link_tipo = $_POST["link_tipo"];
                $link_contrato = $_POST["link_contrato"];
                $link_velocidade = $_POST["link_velocidade"];
                $link_login = $_POST["link_login"];
                $link_senha = $_POST["link_senha"];
                $link_ip = $_POST["link_ip"];
                $link_mascara = $_POST["link_mascara"];
                $link_gateway = $_POST["link_gateway"];
                $link_dns1 = $_POST["link_dns1"];
                $link_dns2 = $_POST["link_dns2"];
                
                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_LINK ('$link_empresa', '$link_fornecedor','$link_tipo', '$link_contrato', '$link_velocidade','$link_login','$link_senha','$link_ip','$link_mascara','$link_gateway', '$link_dns1', '$link_dns2', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Link");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            case "8":
                
                // Variáveis para usar na chamada da PROC
                $equipto_modelo = $_POST["equipto_modelo"];
                $equipto_empresa = $_POST["equipto_empresa"];
                $equipto_depto = $_POST["equipto_depto"];
                $equipto_descricao = $_POST["equipto_descricao"];
                $equipto_usuario = $_POST["equipto_usuario"];
                $equipto_hostname = $_POST["equipto_hostname"];
                $equipto_num_serie = $_POST["equipto_num_serie"];
                $equipto_mac = $_POST["equipto_mac"];
                $equipto_tipo_ip = $_POST["equipto_tipo_ip"];
                $equipto_ip = $_POST["equipto_ip"];
                $equipto_porta = $_POST["equipto_porta"];
                $equipto_sist = $_POST["equipto_sist"];
                $equipto_id_sist = $_POST["equipto_id_sist"];
                $equipto_key_sist = $_POST["equipto_key_sist"];
                $equipto_login = str_replace('\\', '\\\\', $_POST["equipto_login"]);
                $equipto_senha = $_POST["equipto_senha"];
                $equipto_nivel_acesso = $_POST["equipto_nivel_acesso"];
                $equipto_tipo_acesso_remoto = $_POST["equipto_tipo_acesso_remoto"];
                $equipto_end_acesso_remoto = $_POST["equipto_end_acesso_remoto"];
                $equipto_login_acesso_remoto = str_replace('\\', '\\\\', $_POST["equipto_login_acesso_remoto"]);
                $equipto_senha_acesso_remoto = $_POST["equipto_senha_acesso_remoto"];
                $equipto_porta_acesso_remoto = $_POST["equipto_porta_acesso_remoto"];
                $equipto_observacoes = $_POST["equipto_observacoes"];

                // Monta String do comando da PROC
                $inserir = "CALL PROC_INSERE_EQUIPAMENTO ('$equipto_modelo','$equipto_empresa',
                            '$equipto_depto','$equipto_num_serie','$equipto_descricao',
                            '$equipto_observacoes',@msg , @cod_equipamento);";
                
                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar Equipamento");
                }   
                        
                // Recupera Mensagem de retorno da PROC        
                $query_retorno = "SELECT @msg;";                        
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);
                        
                
                // Se o equipamento já existe, não insere. Essa validação quem faz é a PROC.
                if ($msg[0] == 'Equipamento já existe'){
                            
                    break;
                        
                }else{
                    
                    // recupera variável com valor do ID do equipamento cadastrado para usar nos próximos inserts
                    $query_retorno = "SELECT @cod_equipamento;";
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $codigo_equipamento = mysqli_fetch_array($retorno);
                        
                    // insere detalhes de rede
                    // Monta String do comando da PROC
                    $inserir = "CALL PROC_INSERE_DETALHE_REDE ('$equipto_mac','$equipto_tipo_ip','$equipto_ip',
                    '$equipto_porta','$equipto_hostname','$equipto_usuario','$codigo_equipamento[0]');";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $inserir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar gravar detalhes de rede do equipamento");
                    }
                                
                    // insere detalhes de software
                    // Monta String do comando da PROC  
                    $inserir = "CALL PROC_INSERE_DETALHE_SOFTWARE ('$codigo_equipamento[0]','$equipto_sist','$equipto_id_sist', '$equipto_key_sist');";
 
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $inserir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar gravar detalhes de software do equipamento");
                    }
                                
                    // insere detalhes de acesso
                    // Monta String do comando da PROC    
                    $inserir = "CALL PROC_INSERE_DETALHE_ACESSO ('$codigo_equipamento[0]', '$equipto_nivel_acesso', '$equipto_login', '$equipto_senha');";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $inserir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar gravar detalhes de acesso do equipamento");
                    }
                                
                    // insere detalhes de acesso remoto
                    // Monta String do comando da PROC
                    $inserir = "CALL PROC_INSERE_DETALHE_ACESSO_REMOTO ('$codigo_equipamento[0]','$equipto_tipo_acesso_remoto',
                    '$equipto_end_acesso_remoto','$equipto_login_acesso_remoto','$equipto_senha_acesso_remoto',
                    '$equipto_porta_acesso_remoto');";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $inserir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar gravar detalhes de Acesso remoto do equipamento");
                    }
                                
                        
                }
                                
                break; 
                        
            case "9":
                        
                // Variáveis para usar na chamada da PROC
                $tipo_telefone = $_POST["tipo_telefone"];
                
                // Monta String do comando da PROC  
                $inserir = "CALL PROC_INSERE_TIPO_TELEFONE ('$tipo_telefone', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar tipo de telefone");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
                        
            case"10":
                        
                // Variáveis para usar na chamada da PROC
                $tipo_acesso_remoto = $_POST["tipo_acesso_remoto"];
                
                // Monta String do comando da PROC  
                $inserir = "CALL PROC_INSERE_TIPO_ACESSO_REMOTO ('$tipo_acesso_remoto', @msg);";
                $query_retorno = "SELECT @msg;";

                //Executa a PROC e valida o comando
                $grava_bd = mysqli_query($conecta, $inserir);
                if ( !$grava_bd ) {
                    die("Erro ao tentar gravar tipo de acesso remoto");
                }

                // Recupera Mensagem de retorno da PROC
                $retorno = mysqli_query($conecta, $query_retorno);
                $msg = mysqli_fetch_array($retorno);

                break;
                        
            default:
            
                echo "Opção incorreta, acione o suporte";
                
        }
    }
            
?>


<!-- Este HTML retorna para o usuário o resultado da operação. Após clicar no OK do Pop Up, é encaminhado para a página principal.php -->
<!doctype html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
        <title>Grava no Banco</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>
        
        <?php include_once("_incluir/topo_navegavel.php"); ?> 
        
        <div class="container">
        
                <div class="form-row">
                    <div class="col-lg-12">
                    </div>
                </div>
            
                <div class="row justify-content-lg-center">
                    <!-- Modal -->
                    <div class="modal fade" id="ret_proc_cadastro" tabindex="-1" role="dialog" aria-labelledby="label_ret_proc_cadastro" aria-hidden="true">
                      <div class="modal-dialog text-center"  role="document">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <!-- Modal - O título recebe a variável do tipo de operação: Apenas Inclusão. O corpo recebe a mensagem da PROC -->  
                            <h5 class="modal-title" id="label_ret_proc_cadastro"><?php echo $tipo_operacao; ?></h5>
                            </div>
                          <div class="modal-body">
                                            <h6><?php echo $msg[0]; ?></h6>
                           </div>
                          <div class="modal-footer">
                            <a href="principal.php" class="card-link"> <button type="button" class="btn btn-info" > OK </button> </a>
                            </div>
                          </div>
                        </div>
                    </div>
            </div>
        </div>       
                            
  
       <!-- JavaScript do BootStrap -->
        <script src="js/jquery-slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <!-- Carrega o Modal com as informações de retorno das PROCs -->
        <script type="text/javascript">
        $("#ret_proc_cadastro").modal("show");
        </script>
        
    </body>
</html>
