<!-- Recupera listagens do banco conforme as funções são invocadas -->

<?php 
// conexão com o banco
require_once("../../conexao/conexao_dashboard.php");
// essa variável nesse contexto serve como superglobal, podendo ser usada em todas as funções
$conecta = $conecta;



// Listagem simples de equipamentos
function get_equipments()   {

    global $conecta;

    // String de consulta
    $query = "CALL PROC_DISPLAY_EQUIPAMENTOS;";
    
    // Executa PROC. O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_equipments = @$result->num_rows;
        if ($num_equipments == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem completa de equipamentos. Todas essas informações são usadas para alteração, se houver
function get_equipments_full($codigo_equipamento)   {

    global $conecta;

    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EQUIPTO_DISPLAY_FULL WHERE codigo = '$codigo_equipamento';";
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem simples de empresas filtrada por cliente
function get_enterprises_client()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_CLIENT;";
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_enterprises = @$result->num_rows;
        if ($num_enterprises == 0) return false; $result = db_result_to_array1($result);
        return $result;
    
}



// Listagem simples de empresas filtrada por operadoras de telefonia
function get_enterprises_telephone_operator()   {
    
    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_TELEPHONE_OPERATOR;";
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_enterprises = @$result->num_rows;
        if ($num_enterprises == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem simples de empresas filtrada por prestadores de serviço
function get_enterprises_service_provider()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_SERVICE_PROVIDER;";
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_enterprises = @$result->num_rows;
        if ($num_enterprises == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem simples de empresas filtrada por fabricantes
function get_enterprises_manufacturer()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_MANUFACTURER;";
    
    //O resultado é um array com as informações    
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_enterprises = @$result->num_rows;
        if ($num_enterprises == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem completa de empresa. Todas essas informações são usadas para alteração, se houver
function get_enterprises_full($codigo_empresa)   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_FULL WHERE codigo = '$codigo_empresa';";
    
    //O resultado é um array com as informações    
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
    
}



// Listagem simples de links
function get_links()   {

    global $conecta;
    
    // String de consulta
    $query = "CALL PROC_LINK_DISPLAY;";
    
    // Executa PROC. O resultado é um array com as informações    
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_links = @$result->num_rows;
        if ($num_links == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem completa de link. Todas essas informações são usadas para alteração, se houver
function get_links_full($codigo_link)   {

    global $conecta;
    
    // String de consulta
    $query = "SELECT * FROM VW_LINK_DISPLAY_FULL where codigo = '$codigo_link';";
    
    //O resultado é um array com as informações        
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de telefones das empresas. Como está em tabela separada, recupera-se usando o código da emresa selecionada.Todas essas informações são usadas para alteração, se houver
function get_telefones_empresa($codigo_empresa)   {

    global $conecta;
    
    // String de consulta
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_PHONES where cod_empresa = '$codigo_empresa';";
    
    //O resultado é um array com as informações  
    $telefones = mysqli_query($conecta, $query);
    if (!$telefones) 
        return false; 
    return $telefones;
    
}




// Listagem de tipo de empresa.
function get_tipo_empresa()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_TIPO_EMPRESA;";
    
    //O resultado é um array com as informações      
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_tipo_empresa = @$result->num_rows;
        if ($num_tipo_empresa == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de tipo de empresa. Essas informações também são usadas para alteração, se houver.
function get_tipo_empresa_alt($codigo_tipo_empresa)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_EMPRESA where codigo = '$codigo_tipo_empresa';";
        
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de departamentos.
function get_departamento()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_DEPARTAMENTO;";
    
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_departamento = @$result->num_rows;
        if ($num_departamento == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de departamentos. Essas informações também são usadas para alteração, se houver.
function get_departamentos_alt($codigo_departamento)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_DEPARTAMENTO where codigo = '$codigo_departamento';";
    
    
    //O resultado é um array com as informações
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de tipos de telefone.
function get_tipo_telefone()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_TIPO_TELEFONE;";
    
    //O resultado é um array com as informações    
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_tipo_telefone = @$result->num_rows;
        if ($num_tipo_telefone == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de tipos de telefone. Essas informações também são usadas para alteração, se houver.
function get_tipo_telefone_alt($codigo_tipo_telefone)   {

    global $conecta;
    
    // String de consulta
    $query = "SELECT * FROM VW_TIPO_TELEFONE where codigo = '$codigo_tipo_telefone';";
        
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de tipos de equipamento.
function get_tipo_equipamento()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_TIPO_EQUIPAMENTO;";
    
    //O resultado é um array com as informações     
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_tipo_equipamento = @$result->num_rows;
        if ($num_tipo_equipamento == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de tipos de equipamento. Essas informações também são usadas para alteração, se houver.
function get_tipo_equipamento_alt($codigo_tipo_equipamento)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_EQUIPAMENTO where codigo = '$codigo_tipo_equipamento';";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de marcas.
function get_marca()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_MARCA_DISPLAY;";
    
    //O resultado é um array com as informações     
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_marca = @$result->num_rows;
        if ($num_marca == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}




// Listagem de marcas. Essas informações também são usadas para alteração, se houver.
function get_marca_alt($codigo_marca)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_MARCA_DISPLAY where codigo = '$codigo_marca';";
        
    //O resultado é um array com as informações   
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de tipos de acesso remoto.
function get_tipo_acesso_remoto()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_TIPO_ACESSO_REMOTO;";
        
    //O resultado é um array com as informações   
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_tipo_acesso_remoto = @$result->num_rows;
        if ($num_tipo_acesso_remoto == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de tipos de acesso remoto. Essas informações também são usadas para alteração, se houver.
function get_tipo_acesso_remoto_alt($codigo_tipo_acesso_remoto)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_ACESSO_REMOTO where codigo = '$codigo_tipo_acesso_remoto';";
    
    //O resultado é um array com as informações     
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de tipos de sistemas operacionais.
function get_sistema_operacional()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_SIST_OPERACIONAL;";
        
    //O resultado é um array com as informações     
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_sistema_operacional = @$result->num_rows;
        if ($num_sistema_operacional == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de tipos de sistemas operacionais. Essas informações também são usadas para alteração, se houver.
function get_sistema_operacional_alt($codigo_sistema_operacional)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_SIST_OPERACIONAL where codigo = '$codigo_sistema_operacional';";
        
    //O resultado é um array com as informações     
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}



// Listagem de modelos de equipamentos.
function get_modelo()   {

    global $conecta;
    
    // String de consulta. Quando chama a proc, a próxima função se perde, por isso em casos onde demanda-se mais de uma consulta por página, usei SELECT.
    $query = "SELECT * FROM VW_MODELO;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $num_modelo = @$result->num_rows;
        if ($num_modelo == 0) return false; $result = db_result_to_array1($result);
    return $result;
    
}



// Listagem de modelos de equipamentos. Essas informações também são usadas para alteração, se houver.
function get_modelo_alt($codigo_modelo)   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_MODELO where cod_modelo = '$codigo_modelo';";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    $dados = mysqli_fetch_assoc($result);
    return $dados;
    
}


/* ***** LISTAGENS USADAS PARA COMBO BOX ***** */



//NOperadoras de Telefonia
function get_list_telephone_operator()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_LIST_TELEPHONE_OPERATOR;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Tipos de Empresa
function get_list_enterprise_type()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_EMPRESA;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista de clientes
function get_list_client()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_LIST_CLIENTS;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista tipo de equipamento
function get_list_equipment_type()   {

    global $conecta;
    
    // String de consulta.
    $query =    "SELECT * FROM VW_TIPO_EQUIPAMENTO;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista Modelos de Equipamentos
function get_list_equipment_model()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_MODELO;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista de Departamentos
function get_list_department()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_DEPARTAMENTO;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista Fabricantes
function get_list_provider()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_EMPRESA_DISPLAY_MANUFACTURER;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}




function get_list_system_operation()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_SIST_OPERACIONAL;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista tipo de acesso remoto
function get_list_access_remote_type()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_ACESSO_REMOTO;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista Marcas
function get_list_mark()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_MARCA_DISPLAY;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista tipos de telefone
function get_list_type_phone()   {

    global $conecta;
    
    // String de consulta.
    $query = "SELECT * FROM VW_TIPO_TELEFONE;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}



// Lista de Estados
function get_list_state()   {

    global $conecta;
    
    // String de consulta.
    $query =    "SELECT * FROM estado;";
    
    //O resultado é um array com as informações 
    $result = mysqli_query($conecta, $query);
    if (!$result) 
        return false; 
    return $result;
    
}


?>





