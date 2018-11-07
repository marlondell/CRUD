<!-- Programa responsável por realizar alterações ou exclusões no Banco de Dados. As alterações são feitas por entidade -->

<!-- conexão com o banco -->
<?php require_once("../../conexao/conexao_dashboard.php"); ?>



<!-- Teste de segurança. Se a variável de sessão não estiver carregada com o usuário, remete à página de login. -->
<?php
    session_start();
    if ( !isset ($_SESSION["user_portal"])) {
            header("location:login.php");
        }
?>   


<!--  Recebe via POST o código da entidade e as demais informações. Cada Formulário no Front envia um código que vai identificar o tipo de cadastro. Esse código será usado em um switch-case para chamar as procs correspondentes do banco -->
<?php
    if ( !isset ($_POST["cad"]))    {
        
        echo "Falha ao receber dados de alteração. Acione o Suporte.";
    
    }else{
        
        $tipo_cadastro = $_POST["cad"];
            
        /*  0 tipo_empresa, 1 tipo_equipto, 2 empresa, 3 depto, 4 marca, 5 modelo, 6 so, 7 link, 8 equipto,
            9 tipo_telefone, 10 tipo_acesso_remoto, 11 senha_usuario */
        switch ($tipo_cadastro) {
                        
            case "0":
                
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $tipo_empresa_codigo = $_POST["tipo_empresa_codigo"];
                    $tipo_empresa = $_POST["tipo_empresa"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_TIPO_EMPRESA ('$tipo_empresa_codigo', '$tipo_empresa', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    
                    if ( !$grava_bd )   {
                        die("Erro ao alterar tipo de empresa");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $tipo_empresa_codigo = $_POST["tipo_empresa_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_TIPO_EMPRESA ('$tipo_empresa_codigo', @mensagem); ";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar excluir tipo de empresa");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);
                    

                }

                break;
                

            case "1":
                        
                 
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {

                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $tipo_equipamento_codigo = $_POST["tipo_equipamento_codigo"];
                    $tipo_equipamento = $_POST["tipo_equipamento"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_TIPO_EQUIPAMENTO ('$tipo_equipamento_codigo', '$tipo_equipamento', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Tipo de Equipamento");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                
                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $tipo_equipamento_codigo = $_POST["tipo_equipamento_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_TIPO_EQUIPAMENTO ('$tipo_equipamento_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar excluir tipo de equipamento");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                break;
                    
                
            case "2":
                 
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $empresa_codigo = $_POST["empresa_codigo"];
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
                    $alterar = "CALL PROC_ALTERA_EMPRESA ('$empresa_codigo', '$tipo_empresa', '$cnpj', '$razaosocial', '$unidade', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$nome_contato', '$email_contato', '$site', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar alterar empresa");
                    }

                    //Faz um loop para alterar os telefones. Recupera do formulário
                    $cont = 1;
                    while ($cont <= 3)  {
                        
                        /* Verifica se possui código de telefone e número. O nome concatena com o contador porque chega do Front codigo_telefone1, codigo_telefone2 e codigo_telefone3. */
                        if (($_POST["codigo_telefone" . $cont]) && ($_POST["numero_telefone" . $cont])) {
                            
                            // Variáveis para alterar o telefone
                            $codigo_telefone = $_POST["codigo_telefone" . $cont];
                            $tipo_telefone = $_POST["tipo_telefone" . $cont];
                            $numero_telefone = $_POST["numero_telefone" . $cont];
                            
                            // Monta String do comando da PROC
                            $alterar = "CALL PROC_ALTERA_TELEFONE ('$codigo_telefone', '$tipo_telefone', '$numero_telefone', '$empresa_codigo', @msg);";
                            
                            //Executa a PROC e valida o comando
                            $grava_bd = mysqli_query($conecta, $alterar);
                            if ( !$grava_bd )   {
                                die("Erro ao tentar alterar telefone");
                            }

                            $cont ++;
                        }

                        
                        /* Caso tenha APENAS número de telefone, sem código, Significa que no formulário de alteração foi inserido um telefone. Nesse caso, não possui código, executa uma PROC de inserção. O nome concatena com o contador porque chega do Front numero_telefone1, numero_telefone2 e numero_telefone3. */
                        if ((!$_POST["codigo_telefone" . $cont]) && ($_POST["numero_telefone" . $cont]))    {

                            // Variáveis para inserir o telefone
                            $tipo_telefone = $_POST["tipo_telefone" . $cont];
                            $numero_telefone = $_POST["numero_telefone" . $cont];

                            // Monta String do comando da PROC
                            $inserir = "CALL PROC_INSERE_TELEFONE ('$tipo_telefone', '$numero_telefone', '$empresa_codigo');";
                                                        
                            //Executa a PROC e valida o comando
                            $grava_bd = mysqli_query($conecta, $inserir);
                            if ( !$grava_bd )   {
                                die("Erro ao tentar inserir telefone");
                            }

                            $cont ++;

                        }

                    }

                        //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                        $retorno = mysqli_query($conecta, $query_retorno);
                        $mensagem = mysqli_fetch_array($retorno);

                }
                        
                
                        // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                        if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                            
                            //Variável para usar no pop-up de retorno da operação
                            $tipo_operacao = "Exclusão";
                            
                            // Variável para usar na chamada da PROC
                            $empresa_codigo = $_POST["empresa_codigo"];
                            
                            // Monta String do comando da PROC
                            $excluir = "CALL PROC_EXCLUI_EMPRESA ('$empresa_codigo', @mensagem);";
                            $query_retorno = "SELECT @mensagem";
                            
                            //Executa a PROC e valida o comando
                            $grava_bd = mysqli_query($conecta, $excluir);
                            if ( !$grava_bd )   {
                                die("Erro ao tentar excluir empresa");
                            }

                            //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                            $retorno = mysqli_query($conecta, $query_retorno);
                            $mensagem = mysqli_fetch_array($retorno);

                        }
                        
                break;
                        
                        
            case "3":
                        
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $departamento_codigo = $_POST["departamento_codigo"];
                    $departamento = $_POST["departamento"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_DEPATAMENTO ('$departamento_codigo', '$departamento', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Departamento");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                        
                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variáveis para usar na chamada da PROC
                    $departamento_codigo = $_POST["departamento_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_DEPATAMENTO ('$departamento_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir Departamento");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }      

                break;
                
                        
            case "4":
                
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $marca_codigo = $_POST["marca_codigo"];
                    $marca = $_POST["marca"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_MARCA ('$marca_codigo', '$marca', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Marca");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {

                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $marca_codigo = $_POST["marca_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_MARCA ('$marca_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar Excluir Marca");
                    }
                    
                     //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                break;
                        
            case "5":
                
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $modelo_codigo = $_POST["modelo_codigo"];
                    $modelo = $_POST["modelo"];
                    $modelo_codigo_marca = $_POST["cod_marca"];
                    $modelo_codigo_tipo_equipamento = $_POST["cod_tp_equipamento"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_MODELO ('$modelo_codigo', '$modelo_codigo_tipo_equipamento', '$modelo_codigo_marca', '$modelo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Modelo");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                
                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variáveis para usar na chamada da PROC
                    $modelo_codigo = $_POST["modelo_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_MODELO ('$modelo_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir Modelo");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);
                }

                break;
                        
            case "6":
                       
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $sistema_operacional_codigo = $_POST["sist_codigo"];
                    $desc_sist = $_POST["desc_sist"];
                    $versao_sist = $_POST["versao_sist"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_SISTEMA_OPERACIONAL ('$sistema_operacional_codigo', '$desc_sist', '$versao_sist', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Sistema Operacional");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {

                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variáveis para usar na chamada da PROC
                    $sistema_operacional_codigo = $_POST["sist_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_SISTEMA_OPERACIONAL ('$sistema_operacional_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir Sistema Operacional");
                    }
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                break;
                        

            case "7":
                        
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                    
                    //Variáveis para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $link_codigo = $_POST["link_codigo"];
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
                    $alterar = "CALL PROC_ALTERA_LINK ('$link_codigo', '$link_empresa', '$link_fornecedor', '$link_tipo' , '$link_contrato', '$link_velocidade', '$link_login',	'$link_senha', '$link_ip', '$link_mascara', '$link_gateway', '$link_dns1', '$link_dns2', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar alterar Link");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                        
                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variáveis para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $link_codigo = $_POST["link_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_LINK ('$link_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd ) {
                        die("Erro ao tentar Excluir");
                    }

                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                break;
                        
            case "8":
                
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $equipto_codigo = $_POST["equipto_codigo"];
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
                    $equipto_login = str_replace('\\', '\\\\',$_POST["equipto_login"]);
                    $equipto_senha = $_POST["equipto_senha"];
                    $equipto_nivel_acesso = $_POST["equipto_nivel_acesso"];
                    $equipto_tipo_acesso_remoto = $_POST["equipto_tipo_acesso_remoto"];
                    $equipto_end_acesso_remoto = $_POST["equipto_end_acesso_remoto"];
                    $equipto_login_acesso_remoto = str_replace('\\', '\\\\',$_POST["equipto_login_acesso_remoto"]);
                    $equipto_senha_acesso_remoto = $_POST["equipto_senha_acesso_remoto"];
                    $equipto_porta_acesso_remoto = $_POST["equipto_porta_acesso_remoto"];
                    $equipto_observacoes = $_POST["equipto_observacoes"];

                    // Monta String do comando da PROC. Nesse caso, algumas variáveis serão usadas para a tabela de Equipamento. As outras, correspondem a outras tabelas
                    $inserir = "CALL PROC_ALTERA_EQUIPAMENTO ('$equipto_codigo', '$equipto_modelo', '$equipto_empresa', '$equipto_depto', '$equipto_num_serie', '$equipto_descricao', '$equipto_observacoes', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $inserir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar alterar Equipamento");
                    }   
                        
                    
                    //Nesse ponto, alterou apenas o equipamento. Seguirá a alteração dos detalhes. Se houver IP ou MAC, grava os detalhes de rede
                    if (($equipto_ip) || ($equipto_mac))    {

                        // Monta String do comando da PROC
                        $inserir = "CALL PROC_ALTERA_DETALHE_REDE ('$equipto_mac', '$equipto_tipo_ip', '$equipto_ip', '$equipto_porta', '$equipto_hostname', '$equipto_usuario', '$equipto_codigo');";
                        
                        //Executa a PROC e valida o comando
                        $grava_bd = mysqli_query($conecta, $inserir);
                        if ( !$grava_bd )   {
                            die("Erro ao tentar alterar detalhes de rede do equipamento");
                        }
                                
                    }
                        
                    
                    //Caso tenha Sistema cadastrado, serão alterados os detalhes de software.
                    if ($equipto_sist)  {
                        
                        // Monta String do comando da PROC
                        $inserir = "CALL PROC_ALTERA_DETALHE_SOFTWARE ('$equipto_codigo', '$equipto_sist', '$equipto_id_sist' , '$equipto_key_sist');";
                                                                                                
                        //Executa a PROC e valida o comando
                        $grava_bd = mysqli_query($conecta, $inserir);
                        if ( !$grava_bd )   {
                            die("Erro ao tentar alterar detalhes de software do equipamento");
                        }
                    }
                                
                    
                    //Caso tenha dados de acesso cadastrados, serão gravados os detalhes de acesso.
                    if ($equipto_login) {

                        // Monta String do comando da PROC
                        $inserir = "CALL PROC_ALTERA_DETALHE_ACESSO ('$equipto_codigo', '$equipto_nivel_acesso', '$equipto_login', '$equipto_senha');";
                        
                        //Executa a PROC e valida o comando
                        $grava_bd = mysqli_query($conecta, $inserir);
                        if ( !$grava_bd ) {
                            die("Erro ao tentar alterar detalhes de acesso do equipamento");
                        }
                                
                                                              
                    }
                            
                              
                    // se tiver detalhes de acesso remoto nas variáveis, inicia alteração
                    if (($equipto_tipo_acesso_remoto) || ($equipto_end_acesso_remoto))  {

                        // Monta String do comando da PROC
                        $inserir = "CALL PROC_ALTERA_DETALHE_ACESSO_REMOTO ('$equipto_codigo', '$equipto_tipo_acesso_remoto', '$equipto_end_acesso_remoto', '$equipto_login_acesso_remoto', '$equipto_senha_acesso_remoto', '$equipto_porta_acesso_remoto');";
                                                        
                        //Executa a PROC e valida o comando
                        $grava_bd = mysqli_query($conecta, $inserir);
                        if ( !$grava_bd )   {
                            die("Erro ao tentar alterar detalhes de Acesso remoto do equipamento");
                        }
                    }
                                
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);
                            
                }
                        
                                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $equipto_codigo = $_POST["equipto_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_EQUIPAMENTO ('$equipto_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir");
                    }
                    
                    
                    //Caso OK, recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }


                break;
                
                        
            case "9":
                        

                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $tipo_telefone_codigo = $_POST["tipo_telefone_codigo"];
                    $tipo_telefone = $_POST["tipo_telefone"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_TIPO_TELEFONE ('$tipo_telefone_codigo', '$tipo_telefone', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Tipo Telefone");
                    }
                    
                    //Recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                
                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {

                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variáveis para usar na chamada da PROC
                    $tipo_telefone_codigo = $_POST["tipo_telefone_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_TIPO_TELEFONE ('$tipo_telefone_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";
                    
                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir");
                    }
                    
                    //Recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                break;
                        
            case"10"
                                :
                
                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"])))  {
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $tipo_acesso_remoto_codigo = $_POST["tipo_acesso_remoto_codigo"];
                    $tipo_acesso_remoto = $_POST["tipo_acesso_remoto"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_TIPO_ACESSO_REMOTO ('$tipo_acesso_remoto_codigo', '$tipo_acesso_remoto', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd )   {
                        die("Erro ao alterar Tipo de Acesso Remoto");
                    }

                    //Recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }
                        

                // A condição ALTERA=FALSE && EXCLUI=TRUE valida que se trata de uma Exclusão
                if ((isset ($_POST["exclui"])) && (!isset ($_POST["altera"])))  {
                                    
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Exclusão";
                    
                    // Variável para usar na chamada da PROC
                    $tipo_acesso_remoto_codigo = $_POST["tipo_acesso_remoto_codigo"];
                    
                    // Monta String do comando da PROC
                    $excluir = "CALL PROC_EXCLUI_TIPO_ACESSO_REMOTO ('$tipo_acesso_remoto_codigo', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $excluir);
                    if ( !$grava_bd )   {
                        die("Erro ao tentar Excluir Tipo de Acesso Remoto");
                    }
                    
                    //Recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

                break;
                    

            case 11:
                        

                // A condição ALTERA=TRUE && EXCLUI=FALSE valida que se trata de uma alteração
                if ((isset ($_POST["altera"])) && (!isset ($_POST["exclui"]))){    
                        
                    //Variável para usar no pop-up de retorno da operação
                    $tipo_operacao = "Alteração";
                    
                    // Variáveis para usar na chamada da PROC
                    $id_usuario = $_POST["codigo_usuario"];
                    $nome_usuario = $_POST["nome_usuario"];
                    $login_usuario = $_POST["login_usuario"];
                    $nova_senha = $_POST["nova_senha"];
                    
                    // Monta String do comando da PROC
                    $alterar = "CALL PROC_ALTERA_SENHA ('$id_usuario', '$nome_usuario', '$login_usuario', '$nova_senha', @mensagem);";
                    $query_retorno = "SELECT @mensagem";

                    //Executa a PROC e valida o comando
                    $grava_bd = mysqli_query($conecta, $alterar);
                    if ( !$grava_bd ) {
                        die("Erro ao alterar Senha do Usuário");
                    }

                    //Recupera mensagem de retorno da PROC para enviar ao usuário
                    $retorno = mysqli_query($conecta, $query_retorno);
                    $mensagem = mysqli_fetch_array($retorno);

                }

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
        <title>Grava no Banco</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="_css/estilo_dashboard.css" rel="stylesheet">
    </head>

    <body>
        
        <?php include_once("_incluir/topo_navegavel.php"); ?> 
        
        <div id="distancia-topo">
        </div> 
        
        <div class="container">
        
            <div class="form-row">
                <div class="col-lg-12"></div>
            </div>
            <div class="row justify-content-lg-center">
                <!-- Modal - O título recebe a variável do tipo de operação: Alteração ou Exclusão.  O corpo recebe a mensagem da PROC -->
                <div class="modal fade" id="ret_proc_altera" tabindex="-1" role="dialog" aria-labelledby="label_ret_proc_altera" aria-hidden="true">
                  <div class="modal-dialog text-center"  role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h5 class="modal-title" id="label_ret_proc_altera"><?php echo $tipo_operacao; ?></h5>
                        </div>
                      <div class="modal-body">
                        <h6><?php echo $mensagem[0]; ?></h6>
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
        $("#ret_proc_altera").modal("show");
        </script>
        
    </body>
</html>

