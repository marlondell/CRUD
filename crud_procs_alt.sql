

/* PROCEDURE PARA ALTERAÇÃO DE DEPARTAMENTOS */

DROP PROCEDURE IF EXISTS PROC_ALTERA_DEPATAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_DEPATAMENTO (IN cod_departamento INT, IN ins_desc_departamento VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (
			(cod_departamento = 1) OR (cod_departamento = 2) OR (cod_departamento = 3) OR (cod_departamento = 4) OR
            (cod_departamento = 5) OR (cod_departamento = 6) OR (cod_departamento = 7) OR (cod_departamento = 8) OR
            (cod_departamento = 9) OR (cod_departamento = 10) OR (cod_departamento = 11) OR (cod_departamento = 12) OR
            (cod_departamento = 13) OR (cod_departamento = 14)
            ) THEN
        
				SET msg = 'Departamento Padrão do Sistema. NÃO PODE SER ALTERADO';
            
		ELSE
	
				UPDATE departamento SET desc_departamento = ins_desc_departamento WHERE codigo = cod_departamento;
		
				SET msg = 'Departamento Alterado';
       
       END IF;
    
END$$
DELIMITER ;

SET @cod_departamento = 15;
SET @ins_desc_departamento = 'Depto Proc Alterado';
SET @mensagem = null;
CALL PROC_ALTERA_DEPATAMENTO (@cod_departamento, @ins_desc_departamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from departamento;





/* PROCEDURE PARA ALTERAÇÃO DE TIPOS DE TELEFONES */

DROP PROCEDURE IF EXISTS PROC_ALTERA_TIPO_TELEFONE;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_TIPO_TELEFONE (IN cod_tip_telefone INT, IN ins_desc_tipo_telefone VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF ((cod_tip_telefone = 1) OR (cod_tip_telefone = 2) OR (cod_tip_telefone = 3) OR (cod_tip_telefone = 4) OR (cod_tip_telefone = 5)) THEN
	
			SET msg = 'Tipo de Telefone Padrão do Sistema. NÃO PODE SER ALTERADO';
            
		ELSE
            
			UPDATE tipo_telefone SET desc_tipo_telefone = ins_desc_tipo_telefone WHERE codigo = cod_tip_telefone;
			SET msg = 'Tipo de Telefone Alterado';
            
        END IF;    
     
    
END$$
DELIMITER ;

SET @cod_tip_telefone = 6;
SET @ins_desc_tipo_telefone = 'tipoTelProc Alterado';
SET @mensagem = NULL;
CALL PROC_ALTERA_TIPO_TELEFONE (@cod_tip_telefone, @ins_desc_tipo_telefone, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from tipo_telefone;


/* PROCEDURE PARA ALTERAÇÃO DE TIPOS DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_ALTERA_TIPO_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_TIPO_EMPRESA (IN cod_tipo_empresa INT, IN ins_desc_tipo_empresa VARCHAR(30), OUT msg VARCHAR(100))

BEGIN
	
		DECLARE verifica_registro INT DEFAULT 0;
        SET verifica_registro = (SELECT COUNT(*) FROM tipo_empresa WHERE codigo = cod_tipo_empresa);
        
        IF ((cod_tipo_empresa = 1) OR (cod_tipo_empresa = 2) OR (cod_tipo_empresa = 3) OR (cod_tipo_empresa = 4)) THEN
        
			SET msg = 'Tipo de Empresa Padrão do sistema. NÃO PODE SER ALTERADA';
            
		ELSE
    
			UPDATE tipo_empresa SET desc_tipo = ins_desc_tipo_empresa WHERE codigo = cod_tipo_empresa;
			SET msg = 'Tipo de Empresa Alterado';
            
       END IF;
    
END$$
DELIMITER ;

SET @cod_tipo_empresa = 5;
SET @ins_desc_tipo_empresa = 'tipoEmpresaProcAlterado';
SET @mensagem = null;
CALL PROC_ALTERA_TIPO_EMPRESA (@cod_tipo_empresa, @ins_desc_tipo_empresa, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from tipo_empresa;





/* PROCEDURE PARA ALTERAÇÃO DE TIPOS DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_TIPO_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_TIPO_EQUIPAMENTO (IN cod_tipo_equipamento INT, IN ins_desc_tipo_equipamento VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (
			(cod_tipo_equipamento = 1) OR (cod_tipo_equipamento = 2) OR (cod_tipo_equipamento = 3) OR (cod_tipo_equipamento = 4) OR
            (cod_tipo_equipamento = 5) OR (cod_tipo_equipamento = 6) OR (cod_tipo_equipamento = 7) OR (cod_tipo_equipamento = 8) 
            ) THEN
        
				SET msg = 'Tipo de Equipamento Padrão do Sistema. NÃO PODE SER ALTERADO';
            
		ELSE
                
			UPDATE tipo_equipamento SET desc_tipo = ins_desc_tipo_equipamento WHERE codigo = cod_tipo_equipamento;
			SET msg = 'Tipo de Equipamento Alterado';
		
        END IF;
    
END$$
DELIMITER ;

SET @cod_tipo_equipamento = 9;
SET @ins_desc_tipo_equipamento = 'tipoEquipamentoProc ALT';
SET @mensagem = null;
CALL PROC_ALTERA_TIPO_EQUIPAMENTO (@cod_tipo_equipamento, @ins_desc_tipo_equipamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from tipo_equipamento;





/* PROCEDURE PARA ALTERAÇÃO DE MARCAS */

DROP PROCEDURE IF EXISTS PROC_ALTERA_MARCA;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_MARCA (IN cod_marca INT, IN ins_marca VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (
			(cod_marca = 1) OR (cod_marca = 2) OR (cod_marca = 3) OR (cod_marca = 4) OR (cod_marca = 5) OR (cod_marca = 6) OR (cod_marca = 7) OR 
            (cod_marca = 8) 
            ) THEN
        
				SET msg = 'Marca Padrão do Sistema. NÃO PODE SER ALTERADA';
            
		ELSE

				UPDATE marca SET desc_marca = ins_marca WHERE codigo = cod_marca;
				SET msg = 'Marca Alterada';
      
		END IF;
    
END$$
DELIMITER ;

SET @cod_marca = 10;
SET @ins_marca = 'marcaProcALT';
SET @mensagem = null;
CALL PROC_ALTERA_MARCA (@cod_marca, @ins_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from marca;





/* PROCEDURE PARA ALTERAÇÃO DE MODELOS */

DROP PROCEDURE IF EXISTS PROC_ALTERA_MODELO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_MODELO (IN cod_modelo INT, IN alt_cod_tipo_equipamento INT, IN alt_cod_marca INT, IN alt_desc_modelo VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (
			(cod_modelo = 1) OR (cod_modelo = 2) OR (cod_modelo = 3) OR (cod_modelo = 4) OR (cod_modelo = 5) OR (cod_modelo = 6) OR 
            (cod_modelo = 7) OR (cod_modelo = 8) OR (cod_modelo = 9) OR (cod_modelo = 10) OR (cod_modelo = 11) 
            ) THEN
        
				SET msg = 'Modelo de Equipamento Padrão do Sistema. NÃO PODE SER ALTERADO';
            
		ELSE
        
			UPDATE modelo SET cod_tipo_equipamento = alt_cod_tipo_equipamento, cod_marca = alt_cod_marca, desc_modelo = alt_desc_modelo
			WHERE codigo = cod_modelo;
			SET msg = 'Modelo Alterado';
    
		END IF;
    
END$$
DELIMITER ;

SET @cod_modelo = 12;
SET @alt_cod_tipo_equipamento = 2;
SET @alt_desc_modelo = 'descModeloProcALT';
SET @alt_cod_marca = 10;
SET @mensagem = null;
CALL PROC_ALTERA_MODELO (@cod_modelo, @alt_cod_tipo_equipamento, @alt_cod_marca, @alt_desc_modelo, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from modelo;





/* PROCEDURE PARA ALTERAÇÃO DE TIPOS DE ACESSO REMOTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_TIPO_ACESSO_REMOTO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_TIPO_ACESSO_REMOTO (IN cod_tipo_acesso_remoto INT, IN alt_tipo_acesso_remoto VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF ((cod_tipo_acesso_remoto = 1) OR (cod_tipo_acesso_remoto = 2) OR (cod_tipo_acesso_remoto = 3)) THEN
        
			SET msg = 'Tipo de Acesso Remoto Padrão do sistema. NÃO PODE SER ALTERADO';
            
		ELSE

			UPDATE tipo_acesso_remoto SET desc_tipo_acesso_remoto = alt_tipo_acesso_remoto WHERE codigo = cod_tipo_acesso_remoto;
			SET msg = 'Tipo de Acesso Remoto Alterado';
    
		END IF;
    
END$$
DELIMITER ;

SET @cod_tipo_acesso_remoto = 4;
SET @alt_tipo_acesso_remoto = 'tpAcessRemProcALT';
SET @mensagem = null;
CALL PROC_ALTERA_TIPO_ACESSO_REMOTO (@cod_tipo_acesso_remoto, @alt_tipo_acesso_remoto, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from tipo_acesso_remoto;




/* PROCEDURE PARA ALTERAÇÃO DE SISTEMAS OPERACIONAIS */

DROP PROCEDURE IF EXISTS PROC_ALTERA_SISTEMA_OPERACIONAL;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_SISTEMA_OPERACIONAL (IN cod_sistema INT, IN alt_desc_sist VARCHAR(50), IN alt_versao_sist VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (
			(cod_sistema = 1) OR (cod_sistema = 2) OR (cod_sistema = 3) OR (cod_sistema = 4) OR (cod_sistema = 5) OR (cod_sistema = 6) OR 
            (cod_sistema = 7) OR (cod_sistema = 8) OR (cod_sistema = 9) OR (cod_sistema = 10) OR (cod_sistema = 11) 
            ) THEN
        
				SET msg = 'Sistema Operacional Padrão do Sistema. NÃO PODE SER ALTERADO';
            
		ELSE

			UPDATE sistema_operacional SET desc_sist = alt_desc_sist, versao_sist = alt_versao_sist WHERE codigo = cod_sistema;
			SET msg = 'Sistema Operacional Alterado';
            
        END IF;    

END$$
DELIMITER ;

SET @cod_sistema = 12;
SET @alt_desc_sist = 'sistemaOperacionalProcALT';
SET @alt_versao_sist = 'Versão PROC ALT';
SET @mensagem = null;
CALL PROC_ALTERA_SISTEMA_OPERACIONAL (@cod_sistema, @alt_desc_sist, @alt_versao_sist, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from sistema_operacional;






/* PROCEDURE PARA ALTERAÇÃO DE SENHA DE USUÁRIO */
DROP PROCEDURE IF EXISTS PROC_ALTERA_SENHA;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_SENHA (IN cod_usuario INT, IN alt_usuario VARCHAR(30), IN alt_login VARCHAR(30), IN alt_senha VARCHAR(30), OUT msg VARCHAR(100))

BEGIN

		IF (cod_usuario = 1) THEN
        
			SET msg = 'Usuário padrão do sistema. NÃO PODE SER ALTERADO';
            
		ELSE

			UPDATE usuarios SET senha = alt_senha WHERE codigo = cod_usuario AND usuario = alt_usuario AND login = alt_login;
			SET msg = 'Senha Alterada';
    
		END IF;
    
END$$
DELIMITER ;
/*
-- teste de alteração
SET @cod_usuario = 2;
SET @alt_usuario = 'usuarioAltera';
SET @alt_login = 'loginAltera';
SET @alt_senha = 'teste';
SET @mensagem = null;
CALL PROC_ALTERA_SENHA (@cod_usuario, @alt_usuario, @alt_login, @alt_senha, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from usuarios;
*/






/* PROCEDURE PARA ALTERAÇÃO DE LINKS */

DROP PROCEDURE IF EXISTS PROC_ALTERA_LINK;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_LINK (in cod_link INT, IN alt_cod_empresa INT, IN alt_cod_fornecedor INT, IN alt_tipo VARCHAR(9), IN alt_contrato VARCHAR(20), 
									IN alt_velocidade VARCHAR(20), IN alt_login VARCHAR(20), IN alt_senha VARCHAR(20), IN alt_ip VARCHAR(20),
                                    IN alt_mascara VARCHAR(20), IN alt_gateway VARCHAR(20), IN alt_dns1 VARCHAR(20), IN alt_dns2 VARCHAR(20),
                                    OUT msg VARCHAR(100))

BEGIN

		

			UPDATE link SET
							cod_empresa = alt_cod_empresa,
							cod_fornecedor = alt_cod_fornecedor,
							tipo = alt_tipo,
							contrato = alt_contrato,
							velocidade = alt_velocidade,
							login = alt_login,
							senha = alt_senha,
							ip = alt_ip,
							mascara = alt_mascara,
							gateway = alt_gateway,
							dns1 = alt_dns1,
							dns2 = alt_dns2
						WHERE
							codigo = cod_link;
		   SET msg = 'Link Alterado';
           
           
		
END$$
DELIMITER ;

SET @cod_link = 7;
SET @alt_cod_empresa = 1;
SET @alt_cod_fornecedor = 7;
SET @alt_tipo = 'ESTÁTICO';
SET @alt_contrato = 'CONTRATO PROC ALT';
SET @alt_velocidade = 'VELOCIDADE PROC ALT ';
SET @alt_login = 'LOGIN PROC ALT ';
SET @alt_senha = 'SENHA PROC ALT ';
SET @alt_ip = 'IP PROC ALT';
SET @alt_mascara = 'MASCARA PROC ALT';
SET @alt_gateway = 'GATEWAY PROC ALT';
SET @alt_dns1 = 'DNS1 PROC ALT';
SET @alt_dns2 = 'DNS2 PROC ALT';
SET @mensagem = null;
CALL PROC_ALTERA_LINK (@cod_link, @alt_cod_empresa, @alt_cod_fornecedor,@alt_tipo , @alt_contrato, @alt_velocidade, @alt_login,
									@alt_senha, @alt_ip, @alt_mascara, @alt_gateway, @alt_dns1, @alt_dns2, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * from link;





/* PROCEDURE PARA ALTERAÇÃO DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_ALTERA_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_EMPRESA (IN cod_empresa INT, IN alt_cod_tipo_empresa INT, IN alt_cnpj VARCHAR(20), IN alt_razao_social VARCHAR(50),
									IN alt_unidade VARCHAR(30),	IN alt_endereco VARCHAR(50), IN alt_numero VARCHAR(10), IN alt_complemento VARCHAR(50),
                                    IN alt_bairro VARCHAR(50), IN alt_cidade VARCHAR(50), IN alt_estado VARCHAR(2), IN alt_cep VARCHAR(10),
                                    IN alt_nome_contato VARCHAR(40), IN alt_email_contato VARCHAR(50), IN alt_site VARCHAR(50), OUT msg VARCHAR(100))

BEGIN

				UPDATE empresa SET
								cod_tipo_empresa = alt_cod_tipo_empresa,
								cnpj = alt_cnpj,
								razao_social = alt_razao_social,
								unidade = alt_unidade,
								endereco = alt_endereco,
								numero = alt_numero,
								complemento = alt_complemento,
								bairro = alt_bairro,
								cidade = alt_cidade,
								estado = alt_estado,
								cep = alt_cep,
								nome_contato = alt_nome_contato,
								email_contato = alt_email_contato,
								site = alt_site
							   WHERE
								codigo = cod_empresa;
				SET msg = 'Empresa Alterada';
   
		
    
END$$
DELIMITER ;

SET @cod_empresa = 14;
SET @cod_tipo_empresa = 5;
SET @alt_cnpj = 'CNPJ PROC ALT';
SET @alt_razao_social = 'RAZÃO SOCIAL PROC ALT';
SET @alt_unidade = 'UNIDADE PROC ALT';
SET @alt_endereco = 'ENDEREÇO PROC ALT';
SET @alt_numero = 'NUMprocALT';
SET @alt_complemento = 'COMPLEMENTO PROC ALT';
SET @alt_bairro = 'BAIRRO PROC ALT';
SET @alt_cidade = 'CIDADE PROC ALT';
SET @alt_estado = 'SP';
SET @alt_cep = 'CEPprocALT';
SET @alt_nome_contato = 'NOME CONTATO PROC ALT';
SET @alt_email_contato = 'email_contato@procalt.com';
SET @alt_site = 'www.testeprocalt.com';
SET @mensagem = null;

CALL PROC_ALTERA_EMPRESA (@cod_empresa, @cod_tipo_empresa, @alt_cnpj,@alt_razao_social , @alt_unidade, @alt_endereco, @alt_numero, @alt_complemento, @alt_bairro,
						@alt_cidade, @alt_estado, @alt_cep, @alt_nome_contato, @alt_email_contato, @alt_site, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- RECUPERA ÚLTIMO ID INSERIDO
SELECT @cod_empresa;
-- CONFERE ALTERAÇÃO
SELECT * FROM empresa;











/* PROCEDURE PARA ALTERAÇÃO DE TELEFONE */

DROP PROCEDURE IF EXISTS PROC_ALTERA_TELEFONE;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_TELEFONE (IN cod_telefone INT, IN alt_cod_tipo_telefone INT, IN alt_telefone VARCHAR(20), IN ins_cod_empresa INT, OUT msg VARCHAR(50))

BEGIN
			UPDATE telefone SET cod_tipo_telefone = alt_cod_tipo_telefone, numero = alt_telefone
								WHERE codigo = cod_telefone AND cod_empresa = ins_cod_empresa;
			SET msg = 'Telefone Alterado';
         
END$$
DELIMITER ;

SET @cod_telefone = 16;
SET @alt_cod_tipo_telefone = 5;
SET @alt_telefone = 'TELEFONE PROC ALT';
SET @ins_cod_empresa = 14;
SET @msg = NULL;
CALL PROC_ALTERA_TELEFONE (@cod_telefone, @alt_cod_tipo_telefone, @alt_telefone, @ins_cod_empresa, @msg);
-- CONFERE RETORNO DA PROC
SELECT @msg;
-- CONFERE ALTERAÇÃO
SELECT * FROM TELEFONE;









/* PROCEDURE PARA ALTERAÇÃO DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_EQUIPAMENTO (IN cod_equipamento INT, IN alt_cod_modelo INT, IN alt_cod_empresa INT, IN alt_cod_departamento INT,
										  IN alt_num_serie VARCHAR(30), IN alt_descricao VARCHAR(30),
                                          IN alt_observacoes VARCHAR(5000), OUT msg VARCHAR(100))

BEGIN

		UPDATE	equipamento
        SET		cod_modelo = alt_cod_modelo,
                cod_empresa = alt_cod_empresa,
                cod_departamento = alt_cod_departamento,
				num_serie = alt_num_serie,
                descricao = alt_descricao,
                observacoes = alt_observacoes
		WHERE	codigo = cod_equipamento;
    
		SET msg = 'Equipamento Alterado';

END$$
DELIMITER ;

SET @cod_equipamento = 9;
SET @alt_cod_modelo = 1;
SET @alt_cod_empresa = 14;
SET @alt_cod_departamento = 1;
SET @alt_num_serie = 'NUM SERIE PROC ALT';
SET @alt_descricao = 'DESCRIÇÃO PROC ALT';
SET @observacoes = 'OBSERVAÇÃO PROC ALT';
SET @mensagem = null;


CALL PROC_ALTERA_EQUIPAMENTO (@cod_equipamento, @alt_cod_modelo,@alt_cod_empresa , @alt_cod_departamento,  @alt_num_serie, @alt_descricao, 
							  @observacoes, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE ALTERAÇÃO
SELECT * FROM equipamento;





/* PROCEDURE PARA ALTERAÇÃO DE DETALHE DE REDE DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_DETALHE_REDE;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_DETALHE_REDE (IN alt_mac VARCHAR(30), IN alt_tipo_ip VARCHAR(20), IN alt_numero_ip VARCHAR(30), IN alt_porta VARCHAR(10),
										   IN alt_hostname VARCHAR(30), IN alt_usuario VARCHAR(30), IN alt_cod_equipamento INT)

BEGIN

		UPDATE	detalhe_rede 
        SET		mac = alt_mac,
				tipo_ip = alt_tipo_ip,
				numero_ip = alt_numero_ip,
				porta = alt_porta,
				hostname = alt_hostname,
                usuario = alt_usuario
		WHERE cod_equipamento = alt_cod_equipamento;
        
		    
END$$
DELIMITER ;

SET @alt_mac = 'MAC PROC ALT';
SET @alt_tipo_ip = 'DINÂMICO';
SET @alt_numero_ip = 'IP PROC ALT';
SET @alt_porta = 'PORTA ALT';
SET @alt_hostname = 'HOSTNAME PROC ALT';
SET @alt_usuario = 'USUARIO PROC ALT';
SET @alt_cod_equipamento = @cod_equipamento;
CALL PROC_ALTERA_DETALHE_REDE (@alt_mac, @alt_tipo_ip, @alt_numero_ip , @alt_porta, @alt_hostname, @alt_usuario, @alt_cod_equipamento);
-- CONFERE ALTERAÇÃO
SELECT * FROM detalhe_rede;





/* PROCEDURE PARA ALTERAÇÃO DE SISTEMA OPERACIONAL OU FIRMWARE DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_DETALHE_SOFTWARE;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_DETALHE_SOFTWARE (IN ins_cod_equipamento INT, IN alt_cod_so INT, IN alt_id_so VARCHAR(30), IN alt_licenca VARCHAR(30))

BEGIN

	    UPDATE	detalhe_software 
        SET		cod_so = alt_cod_so,
				id = alt_id_so,
				licenca = alt_licenca
		WHERE	cod_equipamento = ins_cod_equipamento;
		
    
END$$
DELIMITER ;

SET @ins_cod_equipamento = @cod_equipamento;
SET @alt_cod_so = 1;
SET @alt_id_so = 'ID SO PROC ALT';
SET @alt_licenca = 'LICENÇA SO PROC ALT';
CALL PROC_ALTERA_DETALHE_SOFTWARE (@ins_cod_equipamento, @alt_cod_so, @alt_id_so , @alt_licenca);
-- CONFERE ALTERAÇÃO--
SELECT * FROM detalhe_software;





/* PROCEDURE PARA ALTERAÇÃO DE DETALHES DE ACESSO DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_DETALHE_ACESSO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_DETALHE_ACESSO (IN ins_cod_equipamento INT, IN alt_nivel VARCHAR(40), IN alt_login VARCHAR(40), 
													 IN alt_senha VARCHAR(30))

BEGIN
		
        UPDATE	detalhe_acesso
        SET		nivel = alt_nivel,
				login = alt_login,
                senha = alt_senha
		WHERE	cod_equipamento = ins_cod_equipamento;
		
    
END$$
DELIMITER ;

SET @ins_cod_equipamento = @cod_equipamento;
SET @alt_nivel = 'NIVELACESSPROCALT';
SET @alt_login = 'LOGIN ACESSO PROC ALT';
SET @alt_senha = 'SENHA ACESSO PROC ALT';
CALL PROC_ALTERA_DETALHE_ACESSO (@ins_cod_equipamento, @alt_nivel, @alt_login, @alt_senha);
-- CONFERE ALTERAÇÃO
SELECT * FROM detalhe_acesso;





/* PROCEDURE PARA ALTERAÇÃO DE DETALHES DE ACESSO REMOTO */

DROP PROCEDURE IF EXISTS PROC_ALTERA_DETALHE_ACESSO_REMOTO;
DELIMITER $$

CREATE PROCEDURE PROC_ALTERA_DETALHE_ACESSO_REMOTO (IN ins_cod_equipamento INT, IN alt_cod_tipo_acesso_remoto INT,
													IN alt_endereco VARCHAR(40), IN alt_login VARCHAR(30), IN alt_senha VARCHAR(30),
                                                    IN alt_porta VARCHAR(10))

BEGIN

	    UPDATE	detalhe_acesso_remoto
        SET		endereco = alt_endereco,
				login = alt_login,
                senha = alt_senha,
                porta = alt_porta,
                cod_tipo_acesso_remoto = alt_cod_tipo_acesso_remoto
		WHERE cod_equipamento = ins_cod_equipamento;
                
		
END$$
DELIMITER ;

SET @ins_cod_equipamento = @cod_equipamento;
SET @alt_cod_tipo_acesso_remoto = 1;
SET @alt_endereco = 'END ACESSO REMOTO PROC alt';
SET @alt_login = 'LOGIN ACESSO REMOTO PROC ALT';
SET @alt_senha = 'SENHA ACESSO REMOTO PROC alt';
SET @alt_porta = 'PT AR PROC';
CALL PROC_ALTERA_DETALHE_ACESSO_REMOTO (@ins_cod_equipamento, @alt_cod_tipo_acesso_remoto, @alt_endereco, @alt_login, @alt_senha, @alt_porta);
-- CONFERE ALTERAÇÃO
SELECT * FROM detalhe_acesso_remoto;
