
/* PROCEDURE PARA INSERÇÃO DE DEPARTAMENTOS */

DROP PROCEDURE IF EXISTS PROC_INSERE_DEPATAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_DEPATAMENTO (IN ins_desc_departamento VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE DEPARTAMENTO JÁ EXISTE NA TABELA
    DECLARE verifica_departamento INT DEFAULT 0;
    SET verifica_departamento = (SELECT COUNT(*) FROM departamento WHERE desc_departamento = ins_desc_departamento);
    
    IF verifica_departamento = 0 THEN
    
		INSERT INTO departamento (desc_departamento) VALUES (ins_desc_departamento);
		SET msg = 'Departamento Inserido';
    ELSE
    
		SET msg = 'Departamento já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_departamento = 'Depto-proc';
SET @mensagem = 'a';
CALL PROC_INSERE_DEPATAMENTO (@ins_desc_departamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from departamento;





/* PROCEDURE PARA INSERÇÃO DE TIPOS DE TELEFONES */

DROP PROCEDURE IF EXISTS PROC_INSERE_TIPO_TELEFONE;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_TIPO_TELEFONE (IN ins_desc_tipo_telefone VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE TIPO DE TELEFONE JÁ EXISTE NA TABELA
    DECLARE verifica_desc_tipo_telefone INT DEFAULT 0;
    SET verifica_desc_tipo_telefone = (SELECT COUNT(*) FROM tipo_telefone WHERE desc_tipo_telefone = ins_desc_tipo_telefone);
    
    IF verifica_desc_tipo_telefone = 0 THEN
    
		INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES (ins_desc_tipo_telefone);
		SET msg = 'Tipo de Telefone Inserido';
    ELSE
    
		SET msg = 'Tipo de Telefone já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_tipo_telefone = 'tipoTelProc';
SET @mensagem = 'a';
CALL PROC_INSERE_TIPO_TELEFONE (@ins_desc_tipo_telefone, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_telefone;


/* PROCEDURE PARA INSERÇÃO DE TIPOS DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_INSERE_TIPO_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_TIPO_EMPRESA (IN ins_desc_tipo_empresa VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE TIPO DE EMPRESA JÁ EXISTE NA TABELA
    DECLARE verifica_desc_tipo_empresa INT DEFAULT 0;
    SET verifica_desc_tipo_empresa = (SELECT COUNT(*) FROM tipo_empresa WHERE desc_tipo = ins_desc_tipo_empresa);
    
    IF verifica_desc_tipo_empresa = 0 THEN
    
		INSERT INTO tipo_empresa (desc_tipo) VALUES (ins_desc_tipo_empresa);
		SET msg = 'Tipo de Empresa Inserido';
    ELSE
    
		SET msg = 'Tipo de Empresa já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_tipo_empresa = 'tipoEmpresaProc';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_EMPRESA (@ins_desc_tipo_empresa, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_empresa;





/* PROCEDURE PARA INSERÇÃO DE TIPOS DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_TIPO_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_TIPO_EQUIPAMENTO (IN ins_desc_tipo_equipamento VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE TIPO DE EQUIPAMENTO JÁ EXISTE NA TABELA
    DECLARE verifica_desc_tipo_equipamento INT DEFAULT 0;
    SET verifica_desc_tipo_equipamento = (SELECT COUNT(*) FROM tipo_equipamento WHERE desc_tipo = ins_desc_tipo_equipamento);
    
    IF verifica_desc_tipo_equipamento = 0 THEN
    
		INSERT INTO tipo_equipamento (desc_tipo) VALUES (ins_desc_tipo_equipamento);
		SET msg = 'Tipo de Equipamento Inserido';
    ELSE
    
		SET msg = 'Tipo de Equipamento já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_tipo_equipamento = 'tipoEquipamentoProc';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_EQUIPAMENTO (@ins_desc_tipo_equipamento, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_equipamento;





/* PROCEDURE PARA INSERÇÃO DE MARCAS */

DROP PROCEDURE IF EXISTS PROC_INSERE_MARCA;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_MARCA (IN ins_marca VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE MARCA JÁ EXISTE NA TABELA
    DECLARE verifica_marca INT DEFAULT 0;
    SET verifica_marca = (SELECT COUNT(*) FROM marca WHERE desc_marca = ins_marca);
    
    IF verifica_marca = 0 THEN
    
		INSERT INTO marca (desc_marca) VALUES (ins_marca);
		SET msg = 'Marca Inserida';
    ELSE
    
		SET msg = 'Marca já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_marca = 'marcaProc';
SET @mensagem = null;
CALL PROC_INSERE_MARCA (@ins_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from marca;





/* PROCEDURE PARA INSERÇÃO DE MODELOS */

DROP PROCEDURE IF EXISTS PROC_INSERE_MODELO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_MODELO (IN ins_desc_modelo VARCHAR(30), IN ins_cod_marca INT, OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE MODELO JÁ EXISTE NA TABELA
    DECLARE verifica_modelo INT DEFAULT 0;
    SET verifica_modelo = (SELECT COUNT(*) FROM modelo WHERE cod_marca = ins_cod_marca AND desc_modelo = ins_desc_modelo);
    
    IF verifica_modelo = 0 THEN
    
		INSERT INTO modelo (desc_modelo, cod_marca) VALUES (ins_desc_modelo, ins_cod_marca);
		SET msg = 'Modelo Inserido';
    ELSE
    
		SET msg = 'Modelo já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_modelo = 'descModeloProc';
SET @ins_cod_marca = 10;
SET @mensagem = null;
CALL PROC_INSERE_MODELO (@ins_desc_modelo, @ins_cod_marca, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from modelo;





/* PROCEDURE PARA INSERÇÃO DE TIPOS DE ACESSO REMOTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_TIPO_ACESSO_REMOTO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_TIPO_ACESSO_REMOTO (IN ins_tipo_acesso_remoto VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE TIPO DE ACESSO REMOTO JÁ EXISTE NA TABELA
    DECLARE verifica_tipo_acesso_remoto INT DEFAULT 0;
    SET verifica_tipo_acesso_remoto = (SELECT COUNT(*) FROM tipo_acesso_remoto WHERE desc_tipo_acesso_remoto = ins_tipo_acesso_remoto);
    
    IF verifica_tipo_acesso_remoto = 0 THEN
    
		INSERT INTO tipo_acesso_remoto (desc_tipo_acesso_remoto) VALUES (ins_tipo_acesso_remoto);
		SET msg = 'Tipo de Acesso Remoto Inserido';
    ELSE
    
		SET msg = 'Tipo de Acesso Remoto já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_tipo_acesso_remoto = 'tipoAcessoRemotoProc';
SET @mensagem = null;
CALL PROC_INSERE_TIPO_ACESSO_REMOTO (@ins_tipo_acesso_remoto, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from tipo_acesso_remoto;




/* PROCEDURE PARA INSERÇÃO DE SISTEMAS OPERACIONAIS */

DROP PROCEDURE IF EXISTS PROC_INSERE_SISTEMA_OPERACIONAL;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_SISTEMA_OPERACIONAL (IN ins_desc_sist VARCHAR(50), IN ins_versao_sist VARCHAR(30), OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE SISTEMA JÁ EXISTE NA TABELA
    DECLARE verifica_sistema_operacional INT DEFAULT 0;
    SET verifica_sistema_operacional = (SELECT COUNT(*) FROM sistema_operacional WHERE desc_sist = ins_desc_sist AND versao_sist = ins_versao_sist);
    
    IF verifica_sistema_operacional = 0 THEN
    
		INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES (ins_desc_sist, ins_versao_sist);
		SET msg = 'Sistema Operacional Inserido';
    ELSE
    
		SET msg = 'Sistema Operacional já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_desc_sist = 'sistemaOperacionalProc';
SET @ins_versao_sist = 'Versão PROC';
SET @mensagem = null;
CALL PROC_INSERE_SISTEMA_OPERACIONAL (@ins_desc_sist, @ins_versao_sist, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from sistema_operacional;





/* PROCEDURE PARA INSERÇÃO DE LINKS */

DROP PROCEDURE IF EXISTS PROC_INSERE_LINK;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_LINK (IN ins_cod_empresa INT, IN ins_cod_fornecedor INT, IN ins_tipo VARCHAR(9), IN ins_contrato VARCHAR(20), 
									IN ins_velocidade VARCHAR(20), IN ins_login VARCHAR(20), IN ins_senha VARCHAR(20), IN ins_ip VARCHAR(20),
                                    IN ins_mascara VARCHAR(20), IN ins_gateway VARCHAR(20), IN ins_dns1 VARCHAR(20), IN ins_dns2 VARCHAR(20),
                                    OUT msg VARCHAR(50))

BEGIN

	-- VERIFICA SE LINK JÁ EXISTE NA TABELA
    DECLARE verifica_link INT DEFAULT 0;
    SET verifica_link = (SELECT COUNT(*) FROM link WHERE cod_empresa = ins_cod_empresa
											AND cod_fornecedor = ins_cod_fornecedor
											AND tipo = ins_tipo
                                            AND contrato = ins_contrato
                                            AND velocidade = ins_velocidade
                                            AND login = ins_login
                                            AND senha = ins_senha
                                            AND ip = ins_ip);
    
    IF verifica_link = 0 THEN
    
		INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2)
					VALUES (ins_cod_empresa, ins_cod_fornecedor, ins_tipo, ins_contrato, ins_velocidade, ins_login, ins_senha, ins_ip,
							ins_mascara, ins_gateway, ins_dns1, ins_dns2);
		SET msg = 'Link Inserido';
    ELSE
    
		SET msg = 'Link já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_cod_empresa = 1;
SET @ins_cod_fornecedor = 7;
SET @ins_tipo = 'ESTÁTICO';
SET @ins_contrato = 'CONTRATO PROC';
SET @ins_velocidade = 'VELOCIDADE PROC';
SET @ins_login = 'LOGIN PROC';
SET @ins_senha = 'SENHA PROC';
SET @ins_ip = 'IP PROC';
SET @ins_mascara = 'MASCARA PROC';
SET @ins_gateway = 'GATEWAY ROC';
SET @ins_dns1 = 'DNS1 PROC';
SET @ins_dns2 = 'DNS2 PROC';
SET @mensagem = null;
CALL PROC_INSERE_LINK (@ins_cod_empresa, @ins_cod_fornecedor,@ins_tipo , @ins_contrato, @ins_velocidade, @ins_login,
									@ins_senha, @ins_ip, @ins_mascara, @ins_gateway, @ins_dns1, @ins_dns2, @mensagem);
-- MENSAGEM DE RETORNO DA PROC
SELECT @mensagem;
-- CONFERE INSERÇÃO
SELECT * from link;





/* PROCEDURE PARA INSERÇÃO DE EMPRESA */

DROP PROCEDURE IF EXISTS PROC_INSERE_EMPRESA;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_EMPRESA (IN ins_cod_tipo_empresa INT, IN ins_cnpj VARCHAR(20), IN ins_razao_social VARCHAR(50), IN ins_unidade VARCHAR(30),
									IN ins_endereco VARCHAR(50), IN ins_numero VARCHAR(10), IN ins_complemento VARCHAR(50), IN ins_bairro VARCHAR(50),
                                    IN ins_cidade VARCHAR(50), IN ins_estado VARCHAR(2), IN ins_cep VARCHAR(10), IN ins_nome_contato VARCHAR(40),
                                    IN ins_email_contato VARCHAR(50), IN site VARCHAR(50), OUT msg VARCHAR(50), OUT cod_empresa INT)

BEGIN

	-- VERIFICA SE EMPRESA JÁ EXISTE NA TABELA
    DECLARE verifica_empresa INT DEFAULT 0;
    
    SET verifica_empresa = (SELECT COUNT(*) FROM empresa WHERE cod_tipo_empresa = ins_cod_tipo_empresa
											AND cnpj = ins_cnpj
											AND razao_social = ins_razao_social
                                            AND unidade = ins_unidade
							);
                                            
    
    IF verifica_empresa = 0 THEN
    
		INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado,
							cep, nome_contato, email_contato, site)
					VALUES (ins_cod_tipo_empresa, ins_cnpj, ins_razao_social, ins_unidade, ins_endereco, ins_numero, ins_complemento, ins_bairro,
							ins_cidade, ins_estado, ins_cep, ins_nome_contato, ins_email_contato, site);
		-- RECUPERA O CÓDIGO DESTE INSERT PARA OS PRÓXIMOS CADASTROS
		SET cod_empresa = (SELECT MAX(codigo) FROM empresa);
		
     
		
     
		SET msg = 'Empresa Inserida';
    ELSE
    
		SET msg = 'Empresa já existe';
        
    END IF;    
    
END$$
DELIMITER ;

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
SELECT * FROM TELEFONE;





/* PROCEDURE PARA INSERÇÃO DE TELEFONE */

DROP PROCEDURE IF EXISTS PROC_INSERE_TELEFONE;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_TELEFONE (IN ins_cod_tipo_telefone INT, IN ins_telefone VARCHAR(20), IN ins_cod_empresa INT)

BEGIN

			INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (ins_cod_tipo_telefone, ins_telefone, ins_cod_empresa);
            
         
END$$
DELIMITER ;

SET @ins_cod_tipo_telefone = 3;
SET @ins_telefone = 'TELEFONE PROC PROC';
SET @ins_cod_empresa = 14;
CALL PROC_INSERE_TELEFONE (@ins_cod_tipo_telefone, @ins_telefone, @ins_cod_empresa);

SELECT * FROM EMPRESA;
SELECT * FROM TELEFONE;









/* PROCEDURE PARA INSERÇÃO DE EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_EQUIPAMENTO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_EQUIPAMENTO (IN ins_cod_modelo INT, IN ins_cod_empresa INT, IN ins_cod_departamento INT, IN ins_num_serie VARCHAR(30), 
										  IN ins_descricao VARCHAR(30),IN observacoes VARCHAR(5000), OUT msg VARCHAR(50), OUT cod_equipamento INT)

BEGIN

	-- VERIFICA SE EQUIPAMENTO JÁ EXISTE NA TABELA
    DECLARE verifica_equipamento INT DEFAULT 0;
    
    SET verifica_equipamento = (SELECT COUNT(*) FROM equipamento WHERE cod_modelo = ins_cod_modelo
											AND cod_empresa = ins_cod_empresa
                                            AND num_serie = ins_num_serie
                                            
								);
                                            
    
    IF verifica_equipamento = 0 THEN
    
		INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes)
								VALUES (ins_cod_modelo, ins_cod_empresa, ins_cod_departamento, ins_num_serie,
										ins_descricao, observacoes);
		-- RECUPERA O CÓDIGO DESTE INSERT PARA OS PRÓXIMOS CADASTROS
		SET cod_equipamento = (SELECT MAX(codigo) FROM equipamento);
		
     
		
     
		SET msg = 'Equipamento Inserido';
    ELSE
    
		SET msg = 'Equipamento já existe';
        
    END IF;    
    
END$$
DELIMITER ;

SET @ins_cod_modelo = 1;
SET @ins_cod_empresa = 14;
SET @ins_cod_departamento = 1;
SET @ins_num_serie = 'NUM SERIE PROC';
SET @ins_descricao = 'DESCRIÇÃO PROC';
SET @observacoes = 'OBSERVAÇÃO PROC';
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









/* PROCEDURE PARA INSERÇÃO DE DETALHE DE REDE DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_DETALHE_REDE;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_DETALHE_REDE (IN ins_mac VARCHAR(30), IN ins_tipo_ip VARCHAR(20), IN ins_numero_ip VARCHAR(30), IN ins_porta VARCHAR(20),
										   IN ins_hostname VARCHAR(30), IN ins_usuario VARCHAR(30), IN ins_cod_equipamento INT)

BEGIN

	    DECLARE new_cod_detalhe_rede INT DEFAULT null;
        
        
		INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento)
						  VALUES (ins_mac, ins_tipo_ip, ins_numero_ip, ins_porta, ins_hostname, 
								  ins_usuario, ins_cod_equipamento);
		
        -- RECUPERA O CÓDIGO DESTE INSERT PARA ATUALIZAR A TABELA DE EQUIPAMENTO
		SET new_cod_detalhe_rede = (SELECT MAX(codigo) FROM detalhe_rede);
        
        -- ATUALIZA A TABELA DE EQUIPAMENTOS COM OS DETALHES DE REDE
        UPDATE equipamento SET cod_detalhe_rede = new_cod_detalhe_rede WHERE codigo = ins_cod_equipamento;
	
    
END$$
DELIMITER ;

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





/* PROCEDURE PARA INSERÇÃO DE SISTEMA OPERACIONAL OU FIRMWARE DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_DETALHE_SOFTWARE;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_DETALHE_SOFTWARE (IN ins_cod_equipamento INT, IN ins_cod_so INT, IN ins_id_so VARCHAR(30), IN ins_licenca VARCHAR(30))

BEGIN

	    DECLARE new_cod_detalhe_software INT DEFAULT null;
        
        
		INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca)
					VALUES (ins_cod_equipamento, ins_cod_so, ins_id_so, ins_licenca);
		
        -- RECUPERA O CÓDIGO DESTE INSERT PARA ATUALIZAR A TABELA DE EQUIPAMENTO
		SET new_cod_detalhe_software = (SELECT MAX(codigo) FROM detalhe_software);
        
        -- ATUALIZA A TABELA DE EQUIPAMENTOS COM OS DETALHES DE SOFTWARE
        UPDATE equipamento SET cod_detalhe_software = new_cod_detalhe_software WHERE codigo = ins_cod_equipamento;
	
    
END$$
DELIMITER ;

SET @ins_cod_equipamento = @cod_equipamento;
SET @ins_cod_so = 1;
SET @ins_id_so = 'ID SO PROC';
SET @ins_licenca = 'LICENÇA SO PROC';
CALL PROC_INSERE_DETALHE_SOFTWARE (@ins_cod_equipamento, @ins_cod_so, @ins_id_so , @ins_licenca);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_software;





/* PROCEDURE PARA INSERÇÃO DE DETALHES DE ACESSO DO EQUIPAMENTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_DETALHE_ACESSO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_DETALHE_ACESSO (IN ins_cod_equipamento INT, IN ins_nivel VARCHAR(40), IN ins_login VARCHAR(40), 
													 IN ins_senha VARCHAR(30))

BEGIN

	    DECLARE new_cod_detalhe_acesso INT DEFAULT null;
        
        
		INSERT INTO detalhe_acesso ( nivel, login, senha, cod_equipamento)
							VALUES (ins_nivel, ins_login, ins_senha, ins_cod_equipamento);
		
        -- RECUPERA O CÓDIGO DESTE INSERT PARA ATUALIZAR A TABELA DE EQUIPAMENTO
		SET new_cod_detalhe_acesso = (SELECT MAX(codigo) FROM detalhe_acesso);
        
        -- ATUALIZA A TABELA DE EQUIPAMENTOS COM OS DETALHES DE ACESSO
        UPDATE equipamento SET cod_detalhe_acesso = new_cod_detalhe_acesso WHERE codigo = ins_cod_equipamento;
	
    
END$$
DELIMITER ;

SET @ins_cod_equipamento = @cod_equipamento;
SET @ins_nivel = 'NIVEL ACESSO PROC';
SET @ins_login = 'LOGIN ACESSO PROC';
SET @ins_senha = 'SENHA ACESSO PROC';
CALL PROC_INSERE_DETALHE_ACESSO (@ins_cod_equipamento, @ins_nivel, @ins_login, @ins_senha);
-- CONFERE INSERÇÃO
SELECT * FROM equipamento;
SELECT * FROM detalhe_acesso;





/* PROCEDURE PARA INSERÇÃO DE DETALHES DE ACESSO REMOTO */

DROP PROCEDURE IF EXISTS PROC_INSERE_DETALHE_ACESSO_REMOTO;
DELIMITER $$

CREATE PROCEDURE PROC_INSERE_DETALHE_ACESSO_REMOTO (IN ins_cod_equipamento INT, IN ins_cod_tipo_acesso_remoto INT, IN ins_endereco VARCHAR(40), 
													 IN ins_login VARCHAR(30), IN ins_senha VARCHAR(30), IN ins_porta VARCHAR(10))

BEGIN

	    DECLARE new_cod_detalhe_acesso_remoto INT DEFAULT null;
        
        
		INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento)
								   VALUES (ins_endereco, ins_login, ins_senha, ins_porta, ins_cod_tipo_acesso_remoto, ins_cod_equipamento);
		
        -- RECUPERA O CÓDIGO DESTE INSERT PARA ATUALIZAR A TABELA DE EQUIPAMENTO
		SET new_cod_detalhe_acesso_remoto = (SELECT MAX(codigo) FROM detalhe_acesso_remoto);
        
        -- ATUALIZA A TABELA DE EQUIPAMENTOS COM OS DETALHES DE ACESSO
        UPDATE equipamento SET cod_detalhe_acesso_remoto = new_cod_detalhe_acesso_remoto WHERE codigo = ins_cod_equipamento;
	
    
END$$
DELIMITER ;

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
