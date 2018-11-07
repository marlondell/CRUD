-- USE MAPEAMENTO;

/* PROCEDURE PARA EXCLUSÃO DE DEPARTAMENTOS */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_DEPATAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_DEPATAMENTO (IN del_cod_departamento INT, OUT msg VARCHAR(100))

BEGIN

		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM equipamento WHERE cod_departamento = del_cod_departamento);
        
        IF (
			(del_cod_departamento = 1) OR (del_cod_departamento = 2) OR (del_cod_departamento = 3) OR (del_cod_departamento = 4) OR
            (del_cod_departamento = 5) OR (del_cod_departamento = 6) OR (del_cod_departamento = 7) OR (del_cod_departamento = 8) OR
            (del_cod_departamento = 9) OR (del_cod_departamento = 10) OR (del_cod_departamento = 11) OR (del_cod_departamento = 12) OR
            (del_cod_departamento = 13) OR (del_cod_departamento = 14)
            ) THEN
        
			SET msg = 'Departamento Padrão do Sistema. NÃO PODE SER EXCLUÍDO';
            
        ELSEIF	verifica_registro > 0 THEN
        
        SET msg = 'Departamento usado em Equipamentos. Remova ou altere antes de excluir';
        
        ELSE

			DELETE FROM departamento WHERE codigo = del_cod_departamento;
		
			SET msg = 'Departamento Excluído';
        
        END IF;
       
    
END$$
DELIMITER ;

-- INSERINDO DEPTO PARA EXCLUIR
SET @ins_desc_departamento = 'Depto-proc EXCLUSÃO';
SET @mensagem = null;
CALL PROC_INSERE_DEPATAMENTO (@ins_desc_departamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from departamento;
SET @del_cod_departamento = 16;
SET @mensagem = null;
CALL PROC_EXCLUI_DEPATAMENTO (@del_cod_departamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from departamento;





/* PROCEDURE PARA EXCLUSÃO DE TIPOS DE TELEFONES */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_TIPO_TELEFONE;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_TIPO_TELEFONE (IN del_cod_tip_telefone INT, OUT msg VARCHAR(100))

BEGIN

		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM telefone WHERE cod_tipo_telefone = del_cod_tip_telefone);
		
        IF ((del_cod_tip_telefone = 1) OR (del_cod_tip_telefone = 2) OR (del_cod_tip_telefone = 3) OR (del_cod_tip_telefone = 4) OR 
			(del_cod_tip_telefone = 5)) THEN
	
			SET msg = 'Tipo de Telefone Padrão do Sistema. NÃO PODE SER EXCLUÍDO';
        
        ELSEIF verifica_registro > 0 THEN
        
			SET msg = 'Tipo de Telefone usado no cadastro de Telefones. Remova ou altere antes de excluir';
        
        ELSE
        
			DELETE FROM tipo_telefone WHERE codigo = del_cod_tip_telefone;
			SET msg = 'Tipo de Telefone Excluído';
     
		END IF;
    
END$$
DELIMITER ;

-- INSERINDO TIPO TELEFONE PARA EXCLUIR
SET @ins_desc_tipo_telefone = 'tipoTelProcEXCLUIR2';
SET @mensagem = NULL;
CALL PROC_INSERE_TIPO_TELEFONE (@ins_desc_tipo_telefone, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_telefone;
SET @del_cod_tip_telefone = 7;
SET @mensagem = NULL;
CALL PROC_EXCLUI_TIPO_TELEFONE (@del_cod_tip_telefone, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from tipo_telefone;




/* PROCEDURE PARA EXCLUSÃO DE TIPOS DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_TIPO_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_TIPO_EMPRESA (IN del_cod_tipo_empresa INT, OUT msg VARCHAR(100))

BEGIN
	
		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM empresa WHERE cod_tipo_empresa = del_cod_tipo_empresa);
        
        IF ((del_cod_tipo_empresa = 1) OR (del_cod_tipo_empresa = 2) OR (del_cod_tipo_empresa = 3) OR (del_cod_tipo_empresa = 4)) THEN
        
			SET msg = 'Tipo de Empresa Padrão do sistema. NÃO PODE SER EXCLUÍDO';
            
        ELSEIF	verifica_registro > 0 THEN
        
        SET msg = 'Tipo de Empresa usado em Empresa ou Link. Remova ou altere antes de excluir';
        
        ELSE
        
		DELETE FROM tipo_empresa WHERE codigo = del_cod_tipo_empresa;
		SET msg = 'Tipo de Empresa Excluído';
    
		END IF;
    
END$$
DELIMITER ;

-- INSERINDO TIPO EMPRESA PARA EXCLUIR 
SET @ins_desc_tipo_empresa = 'tipoEmpresaProcDEL';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_EMPRESA (@ins_desc_tipo_empresa, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_empresa;
SET @del_cod_tipo_empresa = 6;
SET @mensagem = null;
CALL PROC_EXCLUI_TIPO_EMPRESA (@del_cod_tipo_empresa, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from tipo_empresa;


SELECT * FROM EMPRESA;


/* PROCEDURE PARA EXCLUSÃO DE TIPOS DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_TIPO_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_TIPO_EQUIPAMENTO (IN del_cod_tipo_equipamento INT, OUT msg VARCHAR(100))

BEGIN
	
		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM modelo WHERE cod_tipo_equipamento = del_cod_tipo_equipamento);
        
        IF (
			(del_cod_tipo_equipamento = 1) OR (del_cod_tipo_equipamento = 2) OR (del_cod_tipo_equipamento = 3) OR (del_cod_tipo_equipamento = 4) OR
            (del_cod_tipo_equipamento = 5) OR (del_cod_tipo_equipamento = 6) OR (del_cod_tipo_equipamento = 7) OR (del_cod_tipo_equipamento = 8) 
            ) THEN
        
				SET msg = 'Tipo de Equipamento Padrão do Sistema. NÃO PODE SER EXCLUÍDO';
        
        
		ELSEIF verifica_registro > 0 THEN
        
				SET msg = 'Tipo de Equipamento usado em algum Modelo. Remova ou altere antes de excluir';
        
        ELSE
                
				DELETE FROM tipo_equipamento WHERE codigo = del_cod_tipo_equipamento;
				SET msg = 'Tipo de Equipamento Excluído';
        
        END IF;

    
END$$
DELIMITER ;

-- INSERINDO TIPO EQUIPAMENTO PARA EXCLUIR 
SET @ins_desc_tipo_equipamento = 'tipoEquipamentoProcEXCLUI';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_EQUIPAMENTO (@ins_desc_tipo_equipamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_equipamento;
SET @del_cod_tipo_equipamento = 10;
SET @mensagem = null;
CALL PROC_EXCLUI_TIPO_EQUIPAMENTO (@del_cod_tipo_equipamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from tipo_equipamento;





/* PROCEDURE PARA EXCLUSÃO DE MARCAS */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_MARCA;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_MARCA (IN del_cod_marca INT, OUT msg VARCHAR(100))

BEGIN

		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM modelo WHERE cod_marca = del_cod_marca);
        
        IF (
			(del_cod_marca = 1) OR (del_cod_marca = 2) OR (del_cod_marca = 3) OR (del_cod_marca = 4) OR (del_cod_marca = 5) OR (del_cod_marca = 6) OR
            (del_cod_marca = 7) OR (del_cod_marca = 8) 
            ) THEN
        
				SET msg = 'Marca Padrão do Sistema. NÃO PODE SER EXCLUÍDA';
        
		ELSEIF verifica_registro > 0 THEN
        
				SET msg = 'Marca usada em Modelos. Remova ou altere antes de excluir';
        
        ELSE
        
				DELETE FROM marca WHERE codigo = del_cod_marca;
				SET msg = 'Marca Excluída';
		
        END IF;
    
END$$
DELIMITER ;

-- INSERINDO MARCA PARA EXCLUIR 
SET @ins_marca = 'marcaProcEXCLUIR';
SET @mensagem = null;
CALL PROC_INSERE_MARCA (@ins_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from marca;
SET @del_cod_marca = 11;
SET @mensagem = null;
CALL PROC_EXCLUI_MARCA (@del_cod_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from marca;





/* PROCEDURE PARA EXCLUSÃO DE MODELOS */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_MODELO;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_MODELO (IN del_cod_modelo INT, OUT msg VARCHAR(100))

BEGIN
		
        DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM equipamento WHERE cod_modelo = del_cod_modelo);
        
		IF (
			(del_cod_modelo = 1) OR (del_cod_modelo = 2) OR (del_cod_modelo = 3) OR (del_cod_modelo = 4) OR (del_cod_modelo = 5) OR 
            (del_cod_modelo = 6) OR (del_cod_modelo = 7) OR (del_cod_modelo = 8) OR (del_cod_modelo = 9) OR (del_cod_modelo = 10) OR 
            (del_cod_modelo = 11) 
            ) THEN
        
				SET msg = 'Modelo de Equipamento Padrão do Sistema. NÃO PODE SER EXCLUÍDO';
       
		ELSEIF verifica_registro > 0 THEN
        
				SET msg = 'Modelo cadastrado em Equipamentos. Remova ou altere antes de excluir';
        
        ELSE
                
				DELETE FROM modelo WHERE codigo = del_cod_modelo;
				SET msg = 'Modelo Excluído';
        
        END IF;
		    
    
END$$
DELIMITER ;

-- INSERINDO MODELO PARA EXCLUIR 
SET @ins_desc_modelo = 'descModeloProcEXCLUI';
SET @ins_cod_marca = 10;
SET @mensagem = null;
CALL PROC_INSERE_MODELO (@ins_desc_modelo, @ins_cod_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from modelo;
SET @del_cod_modelo = 13;
SET @mensagem = null;
CALL PROC_EXCLUI_MODELO (@del_cod_modelo, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from modelo;





/* PROCEDURE PARA EXCLUSÃO DE TIPOS DE ACESSO REMOTO */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_TIPO_ACESSO_REMOTO;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_TIPO_ACESSO_REMOTO (IN del_cod_tipo_acesso_remoto INT, OUT msg VARCHAR(100))

BEGIN

		
        DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM detalhe_acesso_remoto WHERE cod_tipo_acesso_remoto = del_cod_tipo_acesso_remoto);
        
        IF ((del_cod_tipo_acesso_remoto = 1) OR (del_cod_tipo_acesso_remoto = 2) OR (del_cod_tipo_acesso_remoto = 3)) THEN
        
			SET msg = 'Tipo de Acesso Remoto Padrão do sistema. NÃO PODE SER EXCLUÍDO';
        
		ELSEIF verifica_registro > 0 THEN
        
        SET msg = 'Tipo de Acesso cadastrado em Equipamentos. Remova ou altere antes de excluir';
        
        ELSE
                
		DELETE FROM tipo_acesso_remoto WHERE codigo = del_cod_tipo_acesso_remoto;
		SET msg = 'Tipo de Acesso Remoto Excluído';
        
        END IF;
                	   
    
END$$
DELIMITER ;

-- INSERINDO ACESSO REMOTO PARA EXCLUIR 
SET @ins_tipo_acesso_remoto = 'AcessRemProcEXCLUIR';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_ACESSO_REMOTO (@ins_tipo_acesso_remoto, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_acesso_remoto;
SET @del_cod_tipo_acesso_remoto = 5;
SET @mensagem = null;
CALL PROC_EXCLUI_TIPO_ACESSO_REMOTO (@del_cod_tipo_acesso_remoto, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from tipo_acesso_remoto;




/* PROCEDURE PARA EXCLUSÃO DE SISTEMAS OPERACIONAIS */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_SISTEMA_OPERACIONAL;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_SISTEMA_OPERACIONAL (IN del_cod_sistema INT, OUT msg VARCHAR(100))

BEGIN

		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM detalhe_software WHERE cod_so = del_cod_sistema);
        
        IF (
			(del_cod_sistema = 1) OR (del_cod_sistema = 2) OR (del_cod_sistema = 3) OR (del_cod_sistema = 4) OR (del_cod_sistema = 5) OR 
            (del_cod_sistema = 6) OR (del_cod_sistema = 7) OR (del_cod_sistema = 8) OR (del_cod_sistema = 9) OR (del_cod_sistema = 10) OR 
            (del_cod_sistema = 11) 
            ) THEN
        
				SET msg = 'Sistema Operacional Padrão do Sistema. NÃO PODE SER ALTERADO';
        
		ELSEIF verifica_registro > 0 THEN
        
				SET msg = 'Sistema cadastrado em Equipamentos. Remova ou altere antes de excluir';
        
        ELSE
                
				DELETE FROM sistema_operacional WHERE codigo = del_cod_sistema;
				SET msg = 'Sistema Operacional Excluído';
        
        END IF;
        
END$$
DELIMITER ;

SET @ins_desc_sist = 'sistemaOperacionalProcEXCLUI';
SET @ins_versao_sist = 'Versão PROC EXCLUI';
SET @mensagem = null;
CALL PROC_INSERE_SISTEMA_OPERACIONAL (@ins_desc_sist, @ins_versao_sist, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from sistema_operacional;

SET @del_cod_sistema = 13;
SET @mensagem = null;
CALL PROC_EXCLUI_SISTEMA_OPERACIONAL (@del_cod_sistema, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * from sistema_operacional;





/* PROCEDURE PARA EXCLUSÃO DE LINKS */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_LINK;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_LINK (IN del_cod_link INT, OUT msg VARCHAR(100))

BEGIN

		IF (del_cod_link = 1) THEN
        
				SET msg = 'Link Padrão do Sistema. NÃO PODE SER ALTERADO';
                
        ELSE        

				DELETE FROM link WHERE codigo = del_cod_link;
				SET msg = 'Link Excluído';
   
		END IF;
   
END$$
DELIMITER ;
-- INSERINDO LINK PARA EXCLUIR
SET @ins_cod_empresa = 1;
SET @ins_cod_fornecedor = 7;
SET @ins_tipo = 'ESTÁTICO';
SET @ins_contrato = 'CONTRATPROCEXCLUIR';
SET @ins_velocidade = 'VELOC PROC EXCLUIR';
SET @ins_login = 'LOGIN PROC EXCLUIR';
SET @ins_senha = 'SENHA PROC EXCLUIR';
SET @ins_ip = 'IP PROC EXCLUIR';
SET @ins_mascara = 'MASCARA PROC EXCLUIR';
SET @ins_gateway = 'GATEWAY ROC EXCLUIR';
SET @ins_dns1 = 'DNS1 PROC EXCLUIR';
SET @ins_dns2 = 'DNS2 PROC EXCLUIR';
SET @mensagem = null;
CALL PROC_INSERE_LINK (@ins_cod_empresa, @ins_cod_fornecedor,@ins_tipo , @ins_contrato, @ins_velocidade, @ins_login,
									@ins_senha, @ins_ip, @ins_mascara, @ins_gateway, @ins_dns1, @ins_dns2, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * FROM link;

SET @del_cod_link = 8;
SET @mensagem = null;
CALL PROC_EXCLUI_LINK (@del_cod_link, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from link;





/* PROCEDURE PARA EXCLUSÃO DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_EMPRESA (IN del_cod_empresa INT, OUT msg VARCHAR(100))

BEGIN
		
        DECLARE verifica_registro_link INT DEFAULT 0;
        DECLARE verifica_registro_equipamento INT DEFAULT 0;
        
        SET verifica_registro_link = (SELECT COUNT(*) FROM link WHERE cod_empresa = del_cod_empresa OR cod_fornecedor =  del_cod_empresa);
        SET verifica_registro_equipamento = (SELECT COUNT(*) FROM equipamento WHERE cod_empresa = del_cod_empresa);
        
        IF (
			(del_cod_empresa = 1) OR (del_cod_empresa = 2) OR (del_cod_empresa = 3) OR (del_cod_empresa = 4) OR (del_cod_empresa = 6) OR 
            (del_cod_empresa = 7) OR (del_cod_empresa = 8) OR (del_cod_empresa = 9) 
            ) THEN
        
				SET msg = 'Empresa Padrão do Sistema. NÃO PODE SER EXCLUÍDA';
        
        
		ELSEIF verifica_registro_link > 0 THEN
        
			SET msg = 'Empresa consta no cadastro de links. Remova ou altere antes de excluir';
        
        ELSEIF verifica_registro_equipamento > 0 THEN
        
			SET msg = 'Empresa consta no cadastro de equipamentos. Remova ou altere antes de excluir';
            
		ELSE
                
			DELETE FROM empresa WHERE codigo = del_cod_empresa;
			SET msg = 'Empresa Excluída';
        
        END IF;

    
END$$
DELIMITER ;
-- INSERINDO EMPRESA PARA EXCLUIR
SET @cod_tipo_empresa = 3;
SET @ins_cnpj = 'CNPJ PROC';
SET @ins_razao_social = 'RAZÃO SOCIAL PROC';
SET @ins_unidade = 'UNIDADE PROC';
SET @ins_endereco = 'ENDEREÇO PROC';
SET @ins_numero = 'NUM PROC';
SET @ins_complemento = 'COMPLEMENTO PROC';
SET @ins_bairro = 'BAIRRO PROC';
SET @ins_cidade = 'CIDADE PROC';
SET @ins_estado = 'SP';
SET @ins_cep = 'CEP PROC';
SET @ins_nome_contato = 'NOME CONTATO PROC';
SET @ins_email_contato = 'email_contato@proc.com';
SET @site = 'www.testeproc.com';
SET @mensagem = null;
SET @cod_empresa = null;

CALL PROC_INSERE_EMPRESA (@cod_tipo_empresa, @ins_cnpj,@ins_razao_social , @ins_unidade, @ins_endereco, @ins_numero, @ins_complemento, @ins_bairro,
						@ins_cidade, @ins_estado, @ins_cep, @ins_nome_contato, @ins_email_contato, @site, @mensagem, @cod_empresa);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- RECUPERA ÚLTIMO ID INSERIDO
SELECT @cod_empresa;
-- CONFERE INSERÇÃO
SELECT * FROM EMPRESA;
-- INSERE TELEFONE PARA EXCLUIR
SET @ins_cod_tipo_telefone = 3;
SET @ins_telefone = 'TEL PROC EXCLUIR';
SET @ins_cod_empresa = 15;
CALL PROC_INSERE_TELEFONE (@ins_cod_tipo_telefone, @ins_telefone, @ins_cod_empresa);
-- CONFERE INSERÇÃO
SELECT * FROM telefone WHERE cod_empresa = 15;

SET @del_cod_empresa = 15;
SET @mensagem = null;
CALL PROC_EXCLUI_EMPRESA (@del_cod_empresa, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- RECUPERA ÚLTIMO ID INSERIDO
SELECT @cod_empresa;
-- CONFERE EXCLUSÃO
SELECT * FROM empresa;
SELECT * FROM telefone;







/* PROCEDURE PARA EXCLUSÃO DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_EXCLUI_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_EXCLUI_EQUIPAMENTO (IN del_cod_equipamento INT, OUT msg VARCHAR(100))

BEGIN

		IF (del_cod_equipamento = 1) THEN
        
				SET msg = 'Equipamento Padrão do Sistema. NÃO PODE SER EXCLUÍDO';
		ELSE
        
				DELETE FROM equipamento WHERE codigo = del_cod_equipamento;
				SET msg = 'Equipamento Excluído';
		
        END IF;
		
END$$
DELIMITER ;

-- INSERE EQUIPAMENTO PARA EXCLUIR
SET @ins_cod_modelo = 1;
SET @ins_cod_empresa = 14;
SET @ins_cod_departamento = 1;
SET @ins_num_serie = 'NUM SERIE PROC EXCLUIR';
SET @ins_descricao = 'DESCRIÇÃO PROC EXCLUIR';
SET @observacoes = 'OBSERVAÇÃO PROC EXCLUIR';
SET @mensagem = null;
SET @cod_equipamento = null;

CALL PROC_INSERE_EQUIPAMENTO (@ins_cod_modelo,@ins_cod_empresa , @ins_cod_departamento, @ins_num_serie, @ins_descricao, @observacoes, 
							  @mensagem, @cod_equipamento);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- RECUPERA ÚLTIMO ID INSERIDO - SERÁ USADO NOS INSERTS DOS DETALHES DE REDE, ACESSO, ETC.
SELECT @cod_equipamento;
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
-- INSERE DETALHES DE REDE
SET @ins_mac = 'MAC PROC';
SET @ins_tipo_ip = 'DINÂMICO';
SET @ins_numero_ip = 'IP PROC';
SET @ins_porta = 'PORTA PROC';
SET @ins_hostname = 'HOSTNAME PROC';
SET @ins_usuario = 'USUARIO PROC';
SET @ins_cod_equipamento = @cod_equipamento;
CALL PROC_INSERE_DETALHE_REDE (@ins_mac, @ins_tipo_ip, @ins_numero_ip , @ins_porta, @ins_hostname, @ins_usuario, @ins_cod_equipamento);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_rede;

-- INSERE S.O.

SET @ins_cod_equipamento = @cod_equipamento;
SET @ins_cod_so = 1;
SET @ins_id_so = 'ID SO PROC';
SET @ins_licenca = 'LICENÇA SO PROC';
CALL PROC_INSERE_DETALHE_SOFTWARE (@ins_cod_equipamento, @ins_cod_so, @ins_id_so , @ins_licenca);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_software;

-- INSERE DETALHES DE ACESSO
SET @ins_cod_equipamento = @cod_equipamento;
SET @ins_nivel = 'NIVEL ACESSO PROC';
SET @ins_login = 'LOGIN ACESSO PROC';
SET @ins_senha = 'SENHA ACESSO PROC';
CALL PROC_INSERE_DETALHE_ACESSO (@ins_cod_equipamento, @ins_nivel, @ins_login, @ins_senha);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_acesso;

-- INSERE DETALHES DE ACESSO REMOTO
SET @ins_cod_equipamento = @cod_equipamento;
SET @ins_cod_tipo_acesso_remoto = 1;
SET @ins_endereco = 'END ACESSO REMOTO PROC';
SET @ins_login = 'LOGIN ACESSO REMOTO PROC';
SET @ins_senha = 'SENHA ACESSO REMOTO PROC';
SET @ins_porta = 'PT AR PROC';
CALL PROC_INSERE_DETALHE_ACESSO_REMOTO (@ins_cod_equipamento, @ins_cod_tipo_acesso_remoto, @ins_endereco, @ins_login, @ins_senha, @ins_porta);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_acesso_remoto;


-- TESTE EXCLUSÃO
SET @del_cod_equipamento = @cod_equipamento;
SET @mensagem = null;
CALL PROC_EXCLUI_EQUIPAMENTO (@del_cod_equipamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE EXCLUSÃO
SELECT * FROM equipamento;
-- CONFERE EXCLUSÃO DE DEPENDÊNCIAS

SELECT * FROM detalhe_rede;
SELECT * FROM detalhe_software;
SELECT * FROM detalhe_acesso;
SELECT * FROM detalhe_acesso_remoto;

