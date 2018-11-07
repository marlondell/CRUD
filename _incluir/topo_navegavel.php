
<header>
    
  
        <?php
    require_once("../../conexao/conexao_dashboard_funcao.php"); 
    
            if ( isset($_SESSION["user_portal"])  ) {
                $user = $_SESSION["user_portal"];
                $conecta = connect();
                $saudacao = "SELECT codigo, usuario, login ";
                $saudacao .= "FROM usuarios ";
                $saudacao .= "WHERE codigo = {$user} ";
                
                $saudacao_login = mysqli_query($conecta,$saudacao);
                if(!$saudacao_login) {
                    die("Falha no banco");   
                }
                
                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $codigo = $saudacao_login["codigo"];
                $nome = $saudacao_login["usuario"];
                $login = $saudacao_login["login"];
                
        ?>
            <!--<div class="container">-->
                
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                        <div class="container">
                            
                                <ul class="navbar-nav" id="ul_botoes_menu">
                                    
                                    <li class="nav-item"><a class="nav-link" href="principal.php">Home</a></li>
                                    <li class="nav-item nav-link">&nbsp;</li>
                                    <li class="nav-item"><a class="nav-link" href="lista_equipamento.php">Equipamentos</a></li>
                                    <li class="nav-item nav-link">&nbsp;</li>
                                    <li class="nav-item"><a class="nav-link" href="lista_empresa.php">Empresas</a></li>
                                    <li class="nav-item nav-link">&nbsp;</li>
                                    <li class="nav-item"><a class="nav-link" href="lista_link.php">Links</a></li>
                                    <li class="nav-item nav-link">&nbsp;</li>
                                    <li class="nav-item"><a class="nav-link" href="lista_diversos.php">Diversos</a></li>
                                    <li class="nav-item nav-link">&nbsp;</li>
                                    <li class="nav-item"><a class="nav-link" href="front_cadastro.php">Cadastro</a></li>
                                    
                                </ul>
                            
                                <div class="col-lg-3" id="botoes_perfil">
                                    <span class="navbar-text"><?php echo $nome ?></span>
                                    
                                     <button type="button" class="btn btn-outline-info btn-sm pull-right" data-toggle="modal" data-target="#altera_senha">Altera Senha</button>
                                     <a href="sair.php"><button type="button" class="btn btn-outline-danger btn-sm pull-right">Sair</button></a>
                                </div>
                          </div>   
                      </nav>
                        
                    <?php
                        }
                    ?>
                
                
            <!-- Modal para alterar senha -->
        <div class="modal fade" id="altera_senha" tabindex="-1" role="dialog" aria-labelledby="label_altera_senha" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label_altera_senha">Altera senha</h5>
                    </div>
                    <div class="modal-body">     
                        <form action="back_altera_proc.php" method="post">
                            <input type="text" name="cad" value="11" hidden>
                            <input type="text" name="codigo_usuario" value="<?php echo $codigo; ?>" hidden>
                            <input type="text" name="nome_usuario" value="<?php echo $nome; ?>" hidden>
                            <input type="text" name="login_usuario" value="<?php echo $login; ?>" hidden>
                            <br>
                            <input type="password" class="form-control" id="nova_senha"  name="nova_senha" maxlength="30" placeholder="Nova Senha">
                            <br>
                            <br>
                            
                            <div class="modal-footer">
                                                                
                                    <button type="button" class="btn btn-outline-success" name="altera" value="altera" data-toggle="modal" data-target="#confirma_alteracao_senha">Altera</button>

                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancela</button>
                                
                                <!-- Modal para confirmar alteração -->
                                <div class="modal fade" id="confirma_alteracao_senha" tabindex="-1" role="dialog" aria-labelledby="label_confirma_alteracao_senha" aria-hidden="true">
                                    <div class="modal-dialog text-center modal-sm"  role="document">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title text-center" id="label_confirma_alteracao_senha">Atenção</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Confirma Alteração?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-warning" name="altera" value="altera"> Sim </button>
                                                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Não</button>
                                                    
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
</header>