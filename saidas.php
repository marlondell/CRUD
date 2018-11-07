<!-- Cada função corresponde a um resultado na view. Não compreende todo o Layout, apenas os elementos HTML que contém dados para serem exibidos em tela -->


<!-- Contém a tabela que exibe os resultados recuperados da view de equipamentos do Banco -->
<?php 
function display_equipments($equipto_array)   {  
?>

<div class="table-responsive">
    <table class="table table-light table-hover table-sm">
        <thead class="thead-light text-sm-center">
            <tr>
                <th>Cliente</th>
                <th>Unidade</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Depto</th>
                <th>IP</th>
            </tr>
        </thead>
        <tbody class="text-sm-center font-weight-light">

            <?php foreach ($equipto_array as $row)
                {
            ?>

            <tr class="h-25" onclick="location.href = 'front_detalhes_equipamento.php?altera_equipamento=<?php echo $row["codigo"]?>';" style="cursor: hand;">
                <td><?php echo $row["cliente"]?></td>
                <td><?php echo $row["unidade"]?></td>
                <td><?php echo $row["desc_tipo"]?></td>
                <td><?php echo $row["descricao"]?></td>
                <td><?php echo $row["desc_departamento"]?></td>
                <td><?php echo $row["numero_ip"]?></td>
            </tr>            

            <?php
                }
            ?>

        </tbody>
    </table>
</div>                
<?php
}
?>


<!-- Contém o cartão que exibe os resultados recuperados da viewFULL de equipamentos do Banco -->
<?php
function display_equipments_full($dados_equipamento)   {  
?>


<h5 class="card-title"><?php echo $dados_equipamento["descricao"] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $dados_equipamento["cliente"] . " " .  $dados_equipamento["unidade"] . " " . " - " . " " .                                                                                 $dados_equipamento["desc_departamento"]?></h6>


        <?php echo $dados_equipamento["desc_tipo"] . " " . $dados_equipamento["desc_marca"] . " " . $dados_equipamento["desc_modelo"] . " " . " - " . " " . $dados_equipamento["num_serie"];?>
        <br>
        <br>

        <span class="badge badge-outline-secondary">Host</span><?php echo "&nbsp;&nbsp" .  $dados_equipamento["hostname"] . "&nbsp;&nbsp;&nbsp;";?> 
        <span class="badge badge-outline-secondary">IP</span><?php echo "&nbsp;" .  $dados_equipamento["numero_ip"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Tipo</span><?php echo "&nbsp;" .  $dados_equipamento["tipo_ip"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Usuário</span><?php echo "&nbsp;" .  $dados_equipamento["usuario"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">MAC</span><?php echo "&nbsp;" .  $dados_equipamento["mac"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Porta</span><?php echo "&nbsp;" .  $dados_equipamento["pt_equipto"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>

        <span class="badge badge-outline-secondary">Acesso</span><?php echo "&nbsp;&nbsp" .  $dados_equipamento["nivel"] . "&nbsp;&nbsp;&nbsp;";?> 
        <span class="badge badge-outline-secondary">Login</span><?php echo "&nbsp;" .  $dados_equipamento["login_so"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Senha</span><?php echo "&nbsp;" .  $dados_equipamento["senha_so"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>

        <span class="badge badge-outline-secondary">Tipo Acesso Remoto</span><?php echo "&nbsp;&nbsp" .  $dados_equipamento["desc_tipo_acesso_remoto"] . "&nbsp;&nbsp;&nbsp;";?>
          <br>
        <span class="badge badge-outline-secondary">Endereço</span><?php echo "&nbsp;" .  $dados_equipamento["endereco"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Login</span><?php echo "&nbsp;" .  $dados_equipamento["login"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Senha</span><?php echo "&nbsp;" .  $dados_equipamento["senha"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Porta</span><?php echo "&nbsp;" .  $dados_equipamento["porta"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>

        <span class="badge badge-outline-secondary">Sistema</span><?php echo "&nbsp;&nbsp" .  $dados_equipamento["desc_sist"] . "&nbsp;&nbsp;&nbsp;";?> 
        <span class="badge badge-outline-secondary">Versão</span><?php echo "&nbsp;" .  $dados_equipamento["versao_sist"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">ID</span><?php echo "&nbsp;" .  $dados_equipamento["id"] . "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Product Key</span><?php echo "&nbsp;" .  $dados_equipamento["licenca"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>
        <span class="badge badge-outline-secondary">Observações</span><?php echo "&nbsp;&nbsp" .  $dados_equipamento["observacoes"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>

<?php
}
?>


<!-- Contém a tabela que exibe os resultados recuperados da view de empresas do Banco -->
<?php
function display_enterprises($enterprise_array)   {  
?>
<div class="table-responsive">
    <table class="table table-light table-hover table-sm ">
        <thead class="thead-light text-sm-center">
            <tr>
                <th>Razão Social</th>
                <th>Unidade</th>
                <th>Telefone</th>
                <th>Setor</th>
                <th>Contato</th>
                <th>E-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-sm-center font-weight-light">

            <?php foreach ($enterprise_array as $row)
                {
            ?>
            <!-- A função Onclick transforma cada elemento num link. Foi colocado em TD por conta do link do botão -->
            <tr class="h-25" >
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["razao_social"]?></td>
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["unidade"]?></td>
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["numero"]?></td>
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["desc_tipo_telefone"]?></td>
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["nome_contato"]?></td>
                <td onclick="location.href = 'front_detalhes_empresa.php?altera_empresa=<?php echo $row["codigo"]?>';" style="cursor: hand;"><?php echo $row["email_contato"]?></td>
                <td><a  href="<?php echo $row["site"]?>" target="_blank"><button type="button" class="btn btn-outline-success btn-sm" name="altera" value="altera">www</button></a></td>
            </tr>            

            <?php   
                }
            ?>

        </tbody>
    </table>
</div>                

<?php
}
?>


<!-- Contém o cartão que exibe os resultados recuperados da viewFULL de empresas do Banco -->
<?php
function display_enterprises_full($dados_empresa)   {  
$lista_telefone = get_telefones_empresa($dados_empresa["codigo"]);
?>


    <h5 class="card-title"><?php echo $dados_empresa["razao_social"] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $dados_empresa["unidade"];?></h6>

    <span class="badge badge-outline-secondary">Tipo de Empresa</span><?php echo "&nbsp;&nbsp" .  $dados_empresa["desc_tipo"] . "&nbsp;&nbsp;&nbsp;";?>

    <br>
    <span class="badge badge-outline-secondary">Endereço</span><?php echo "&nbsp;" .  $dados_empresa["endereco"] . "," . "&nbsp;" . 
    $dados_empresa["numero"] . "&nbsp;" . $dados_empresa["complemento"] .  "&nbsp;" . $dados_empresa["cidade"] .  "&nbsp;" . 
    $dados_empresa["estado"] . "&nbsp;" . $dados_empresa["cep"] .  "&nbsp;";?>
    <br>
    <span class="badge badge-outline-secondary">Contato</span><?php echo "&nbsp;" .  $dados_empresa["nome_contato"] .  "&nbsp;&nbsp;&nbsp;" . 
    $dados_empresa["email_contato"] .  "&nbsp;";?>
    <br>

    <?php
        while ( $linha_telefone = mysqli_fetch_assoc($lista_telefone)) {
    ?>

        <?php echo "&nbsp;&nbsp" .  $linha_telefone["desc_tipo_telefone"] . "&nbsp;&nbsp;&nbsp;" . $linha_telefone["numero"];?>

    <?php
        }
    ?>

    <br>
    <?php echo $dados_empresa["site"];?>
    <br>
    <br>

<?php
}
?>


<!-- Contém a tabela que exibe os resultados recuperados da view de links do Banco -->
<?php
function display_links($link_array)   {  
?>
                
<div class="table-responsive">
    <table class="table table-light table-hover table-sm">
        <thead class="thead-light text-sm-center">
            <tr>
                <th>Cliente</th>
                <th>Unidade</th>
                <th>CNPJ</th>
                <th>Operadora</th>
                <th>Velocidade</th>
                <th>Tipo</th>
                <th>Contrato/Designação</th>
                <th>Suporte</th>
            </tr>
        </thead>
        <tbody class="text-sm-center font-weight-light">

            <?php foreach ($link_array as $row)
                {
            ?>

            <tr class="h-25" onclick="location.href = 'front_detalhes_link.php?altera_link=<?php echo $row["codigo"]?>';" style="cursor: hand;">
                <td><?php echo $row["cliente"]?></td>
                <td><?php echo $row["unidade"]?></td>
                <td><?php echo $row["cnpj"]?></td>
                <td><?php echo $row["operadora"]?></td>
                <td><?php echo $row["velocidade"]?></td>
                <td><?php echo $row["tipo"]?></td>
                <td><?php echo $row["contrato"]?></td>
                <td><?php echo $row["numero"]?><td>
            </tr>

            <?php
                }
            ?>

        </tbody>
    </table>
</div>                

<?php
}
?>


<!-- Contém o cartão que exibe os resultados recuperados da viewFULL de empresas do Banco -->
<?php

function display_links_full($dados_link)   {  
$lista_telefone = get_telefones_empresa($dados_link["cod_cliente"]);

?>


<h5 class="card-title"><?php echo $dados_link["cliente"] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $dados_link["unidade"];?></h6>


        <span class="badge badge-outline-secondary">CNPJ Cliente</span><?php echo "&nbsp;&nbsp" .  $dados_link["cnpj"] . "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>
        <?php echo "&nbsp;" .  $dados_link["operadora"];?>
        <br>
        <br>
        <span class="badge badge-outline-secondary">Contrato</span><?php echo "&nbsp;" .  $dados_link["contrato"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Velocidade</span><?php echo "&nbsp;" .  $dados_link["velocidade"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Tipo</span><?php echo "&nbsp;" .  $dados_link["tipo"] .  "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <span class="badge badge-outline-secondary">IP</span><?php echo "&nbsp;" .  $dados_link["ip"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Máscara</span><?php echo "&nbsp;" .  $dados_link["mascara"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Gateway</span><?php echo "&nbsp;" .  $dados_link["gateway"] .  "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <span class="badge badge-outline-secondary">Dns1</span><?php echo "&nbsp;" .  $dados_link["dns1"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Dns2</span><?php echo "&nbsp;" .  $dados_link["dns2"] .  "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <span class="badge badge-outline-secondary">Login</span><?php echo "&nbsp;" .  $dados_link["login"] .  "&nbsp;&nbsp;&nbsp;";?>
        <span class="badge badge-outline-secondary">Senha</span><?php echo "&nbsp;" .  $dados_link["senha"] .  "&nbsp;&nbsp;&nbsp;";?>
        <br>
        <br>

            <?php
                while ( $linha_telefone = mysqli_fetch_assoc($lista_telefone)) {
            ?>

                <?php echo "&nbsp;&nbsp" .  $linha_telefone["desc_tipo_telefone"] . "&nbsp;&nbsp;&nbsp;" . $linha_telefone["numero"];?>

            <?php
                }
            ?>
        <br>
        <br>


<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de tipo_de_empresa do Banco -->
<?php
function display_tipo_empresa($tipo_empresa_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($tipo_empresa_array as $row)
        {
    ?>

    <a  href="front_altera_diversos.php?altera_tipo_empresa=<?php echo $row["codigo"]?>"
    class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_tipo"]?></a>   

    <?php
        }
    ?>
</div>

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de tipo_de_departamento do Banco -->
<?php
function display_departamento($departamento_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($departamento_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_departamento=<?php echo $row["codigo"]?>" 
       class="list-group-item list-group-item-action bg-light"> <?php echo $row["desc_departamento"]?></a>

    <?php
        }
    ?>
</div>                                      

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de tipo_de_telefone do Banco -->
<?php
function display_tipo_telefone($tipo_telefone_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($tipo_telefone_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_tipo_telefone=<?php echo $row["codigo"]?>"
    class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_tipo_telefone"]?></a>

    <?php
        }
    ?>
</div>

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de tipo_de_equipamento do Banco -->                                
<?php
function display_tipo_equipamento($tipo_equipamento_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($tipo_equipamento_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_tipo_equipamento=<?php echo $row["codigo"]?>"
    class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_tipo"]?></a>

    <?php
        }
    ?>
</div>

<?php
}
?>
                                
                   
<!-- Contém a lista que exibe os resultados recuperados da view de marca do Banco --> 
<?php
function display_marca($marca_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($marca_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_marca=<?php echo $row["codigo"]?>"
    class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_marca"]?></a>

    <?php
        }
    ?>
</div>

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de tipo_de_acesso_remoto do Banco -->
<?php
function display_tipo_acesso_remoto($tipo_acesso_remoto_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($tipo_acesso_remoto_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_tipo_acesso_remoto=<?php echo $row["codigo"]?>"
       class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_tipo_acesso_remoto"]?></a>

    <?php
        }
    ?>
</div>

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de sistema_operacional do Banco -->
<?php
function display_sistema_operacional($sistema_operacional_array)   {  
?>
            
<div class="list-group font-weight-light">
    <?php foreach ($sistema_operacional_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_sistema_operacional=<?php echo $row["codigo"]?>"
        class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_sist"] . " " . $row["versao_sist"] ?></a>

    <?php
        }
    ?>
</div>

<?php
}
?>


<!-- Contém a lista que exibe os resultados recuperados da view de modelo_de_equipamentos do Banco -->
<?php
function display_modelo($modelo_array)   {  
?>

<div class="list-group font-weight-light">
    <?php foreach ($modelo_array as $row)
        {
    ?>
    <a  href="front_altera_diversos.php?altera_modelo=<?php echo $row["cod_modelo"]?>"
       class="list-group-item list-group-item-action bg-light"><?php echo $row["desc_tipo"] . " " . $row["desc_marca"] . " " . $row["desc_modelo"] ?></a>

    <?php
        }
    ?>
    
</div>

<?php
}
?>
