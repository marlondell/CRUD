-- USE mapeamento;

/* ********** VIEWS ********** */


-- consulta parcial de equipamento usada na view do usuário
DROP VIEW IF EXISTS VW_EQUIPTO_DISPLAY;
CREATE VIEW VW_EQUIPTO_DISPLAY AS SELECT equipamento.codigo, empresa.razao_social as cliente, empresa.unidade, tipo_equipamento.desc_tipo, 
											equipamento.descricao, departamento.desc_departamento,
                                            detalhe_rede.numero_ip
                                    FROM equipamento
                                    INNER JOIN empresa ON empresa.codigo = equipamento.cod_empresa
                                    INNER JOIN modelo ON modelo.codigo = equipamento.cod_modelo
                                    INNER JOIN tipo_equipamento ON tipo_equipamento.codigo = modelo.cod_tipo_equipamento
                                    INNER JOIN departamento ON departamento.codigo = equipamento.cod_departamento
                                    INNER JOIN detalhe_rede ON detalhe_rede.codigo = equipamento.cod_detalhe_rede
                                    ;

-- consulta completa de equipamento                                    
DROP VIEW IF EXISTS VW_EQUIPTO_DISPLAY_FULL;
CREATE VIEW VW_EQUIPTO_DISPLAY_FULL AS SELECT equipamento.codigo, emp.codigo as cod_emp, emp.razao_social as cliente, emp.unidade,
												tipo_equipamento.codigo as cod_tipo_equipamento, tipo_equipamento.desc_tipo, 
												marca.desc_marca, modelo.codigo as cod_modelo, modelo.desc_modelo,
                                                equipamento.descricao, departamento.codigo as cod_depto, departamento.desc_departamento, equipamento.num_serie,
                                                detalhe_rede.numero_ip, detalhe_rede.hostname, detalhe_rede.tipo_ip, detalhe_rede.mac,
                                                detalhe_rede.porta as pt_equipto, detalhe_rede.usuario,
                                                detalhe_acesso.nivel, detalhe_acesso.login as login_so, detalhe_acesso.senha as senha_so,
                                                tipo_acesso_remoto.codigo as cod_tipo_acesso_remoto, tipo_acesso_remoto.desc_tipo_acesso_remoto,detalhe_acesso_remoto.endereco,
                                                detalhe_acesso_remoto.login, detalhe_acesso_remoto.senha, detalhe_acesso_remoto.porta,
                                                sistema_operacional.codigo as cod_sist, sistema_operacional.desc_sist, sistema_operacional.versao_sist, dt_soft.id, dt_soft.licenca,
                                                equipamento.observacoes
                                    FROM equipamento
                                    INNER JOIN empresa emp ON emp.codigo = equipamento.cod_empresa
                                    INNER JOIN modelo ON modelo.codigo = equipamento.cod_modelo
                                    INNER JOIN tipo_equipamento ON tipo_equipamento.codigo = modelo.cod_tipo_equipamento
                                    INNER JOIN marca ON marca.codigo = modelo.cod_marca
                                    INNER JOIN departamento ON departamento.codigo = equipamento.cod_departamento
                                    INNER JOIN detalhe_rede ON detalhe_rede.cod_equipamento = equipamento.codigo
                                    INNER JOIN detalhe_acesso ON detalhe_acesso.cod_equipamento = equipamento.codigo
                                    INNER JOIN detalhe_acesso_remoto ON detalhe_acesso_remoto.codigo = equipamento.cod_detalhe_acesso_remoto
                                    INNER JOIN tipo_acesso_remoto ON tipo_acesso_remoto.codigo = detalhe_acesso_remoto.cod_tipo_acesso_remoto
                                    INNER JOIN detalhe_software dt_soft ON dt_soft.cod_equipamento = equipamento.codigo
                                    INNER JOIN sistema_operacional ON sistema_operacional.codigo = dt_soft.cod_so
                                    ;                                    
                                    
-- recupara registro das empresas clientes da Revenda                                    
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_CLIENT;
CREATE VIEW VW_EMPRESA_DISPLAY_CLIENT AS SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Cliente Revenda' GROUP BY emp.codigo;

-- recupara registro das Operadoras de Telefonia                                      
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_TELEPHONE_OPERATOR;
CREATE VIEW VW_EMPRESA_DISPLAY_TELEPHONE_OPERATOR AS SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Operadora Telefonia' GROUP BY emp.codigo; 

-- recupara registro das empresas Prestadoras de Serviço                                      
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_SERVICE_PROVIDER;
CREATE VIEW VW_EMPRESA_DISPLAY_SERVICE_PROVIDER AS SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Prestador de Serviço' GROUP BY emp.codigo;                                    
                                    
-- recupara registro de Fabricantes  
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_MANUFACTURER;
CREATE VIEW VW_EMPRESA_DISPLAY_MANUFACTURER AS SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Fabricante' GROUP BY emp.codigo;                                    

-- todos os campos da empresa                                    
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_FULL;
CREATE VIEW VW_EMPRESA_DISPLAY_FULL AS SELECT emp.codigo, emp.cod_tipo_empresa, tip_emp.desc_tipo, emp.cnpj, emp.razao_social, emp.unidade, emp.endereco,
											  emp.numero, emp.complemento, emp.bairro, emp.cidade, emp.estado, emp.cep, emp.nome_contato,
                                              emp.email_contato, emp.site
									FROM empresa emp
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa;                                    
                                    

-- todos os telefones da empresa                                    
DROP VIEW IF EXISTS VW_EMPRESA_DISPLAY_PHONES;
CREATE VIEW VW_EMPRESA_DISPLAY_PHONES AS SELECT tel.codigo, tel.numero, tel.cod_empresa, tel.cod_tipo_telefone, tipo_telefone.desc_tipo_telefone
										FROM telefone tel
                                        INNER JOIN tipo_telefone ON tipo_telefone.codigo = tel.cod_tipo_telefone
                                        INNER JOIN empresa ON empresa.codigo = tel.cod_empresa;


-- recupera alguns dados de link para a view de listagem                                    
DROP VIEW IF EXISTS VW_LINK_DISPLAY;
CREATE VIEW VW_LINK_DISPLAY AS SELECT lkemp.codigo, emp.cnpj, emp.razao_social AS cliente, emp.unidade, op.razao_social AS operadora, tel.numero,                     lkemp.ip, lkemp.contrato, lkemp.velocidade, lkemp.tipo 
                                FROM empresa emp 
                                INNER JOIN link lkemp ON lkemp.cod_empresa = emp.codigo 
                                INNER JOIN empresa op ON op.codigo = lkemp.cod_fornecedor
                                INNER JOIN telefone tel ON tel.cod_empresa = op.codigo
                                INNER JOIN tipo_telefone ON tipo_telefone.codigo = tel.cod_tipo_telefone
                                WHERE tipo_telefone.desc_tipo_telefone = 'Suporte';
                                
                                
-- recupera todos dados de link                                  
DROP VIEW IF EXISTS VW_LINK_DISPLAY_FULL;
CREATE VIEW VW_LINK_DISPLAY_FULL AS SELECT lkemp.codigo, emp.cnpj, emp.codigo AS cod_cliente, emp.razao_social AS cliente, emp.unidade,
											op.codigo AS cod_operadora, op.razao_social AS operadora,
											lkemp.ip, lkemp.contrato, lkemp.velocidade, lkemp.tipo, lkemp.mascara, lkemp.gateway, lkemp.dns1,
                                            lkemp.dns2, lkemp.login, lkemp.senha
								FROM empresa emp 
                                INNER JOIN link lkemp ON lkemp.cod_empresa = emp.codigo 
                                INNER JOIN empresa op ON op.codigo = lkemp.cod_fornecedor
                                INNER JOIN telefone tel ON tel.cod_empresa = op.codigo
                                INNER JOIN tipo_telefone ON tipo_telefone.codigo = tel.cod_tipo_telefone;
                                
                                
-- recupera todos os tipos de empresa
DROP VIEW IF EXISTS VW_TIPO_EMPRESA;
CREATE VIEW VW_TIPO_EMPRESA AS SELECT * FROM tipo_empresa ORDER BY desc_tipo;

-- recupera todos os tipos de departamento
DROP VIEW IF EXISTS VW_DEPARTAMENTO;
CREATE VIEW VW_DEPARTAMENTO AS SELECT * FROM departamento ORDER BY desc_departamento;

-- recupera todos os tipos de telefone
DROP VIEW IF EXISTS VW_TIPO_TELEFONE;
CREATE VIEW VW_TIPO_TELEFONE AS SELECT * FROM tipo_telefone ORDER BY desc_tipo_telefone;

-- recupera todos os tipos de equipamento
DROP VIEW IF EXISTS VW_TIPO_EQUIPAMENTO;
CREATE VIEW VW_TIPO_EQUIPAMENTO AS SELECT * FROM tipo_equipamento ORDER BY desc_tipo;

-- recupera todos os tipos de marca
DROP VIEW IF EXISTS VW_MARCA_DISPLAY;
CREATE VIEW VW_MARCA_DISPLAY AS SELECT * FROM marca ORDER BY desc_marca;

-- recupera todos os tipos de acesso remoto
DROP VIEW IF EXISTS VW_TIPO_ACESSO_REMOTO;
CREATE VIEW VW_TIPO_ACESSO_REMOTO AS SELECT * FROM tipo_acesso_remoto ORDER BY desc_tipo_acesso_remoto;

-- recupera todos os tipos de sistema operacional
DROP VIEW IF EXISTS VW_SIST_OPERACIONAL;
CREATE VIEW VW_SIST_OPERACIONAL AS SELECT * FROM sistema_operacional ORDER BY desc_sist;

-- recupera todos os tipos modelos de equipamento
DROP VIEW IF EXISTS VW_MODELO;
CREATE VIEW VW_MODELO AS 	SELECT tp.codigo as cod_tp_equipamento, tp.desc_tipo, md.cod_marca, mk.desc_marca, md.codigo AS cod_modelo, md.desc_modelo
							FROM modelo md
							INNER JOIN marca mk ON mk.codigo = md.cod_marca 
                            INNER JOIN tipo_equipamento tp ON tp.codigo = md.cod_tipo_equipamento
                            ORDER BY desc_tipo;
-- testa a view
SELECT * FROM VW_MODELO;



/*     ******   LISTAGENS   ******      */

DROP VIEW IF EXISTS VW_LIST_TELEPHONE_OPERATOR;
CREATE VIEW VW_LIST_TELEPHONE_OPERATOR AS	SELECT emp.codigo, emp.razao_social 
											FROM empresa AS emp 
                                            INNER JOIN tipo_empresa AS tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa 
                                            WHERE desc_tipo = 'Operadora Telefonia' 
                                            ORDER BY emp.razao_social asc;
-- testa a view
SELECT * FROM VW_LIST_TELEPHONE_OPERATOR;                                            









DROP VIEW IF EXISTS VW_LIST_CLIENTS;
CREATE VIEW VW_LIST_CLIENTS AS	SELECT emp.codigo, emp.razao_social, emp.unidade
								FROM empresa AS emp 
                                INNER JOIN tipo_empresa AS tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                WHERE desc_tipo = 'Cliente Revenda'
                                ORDER BY emp.razao_social asc;
-- testa a view
SELECT * FROM VW_LIST_CLIENTS;   









/* ***** PROCEDURES PARA VIEW DE EQUIPAMENTOS ( LISTAGEM PARCIAL) ***** */

DROP PROCEDURE IF EXISTS PROC_DISPLAY_EQUIPAMENTOS;
DELIMITER $$

CREATE PROCEDURE PROC_DISPLAY_EQUIPAMENTOS ()

BEGIN

	SELECT * FROM VW_EQUIPTO_DISPLAY;
    
END$$
DELIMITER ;
-- TESTE DA PROC
CALL PROC_DISPLAY_EQUIPAMENTOS;




/* ***** PROCEDURES PARA VIEW DE EQUIPAMENTOS ( LISTAGEM FULL) ***** */

DROP PROCEDURE IF EXISTS PROC_DISPLAY_EQUIPAMENTOS_FULL;
DELIMITER $$

CREATE PROCEDURE PROC_DISPLAY_EQUIPAMENTOS_FULL (IN cod_equipamento INT)

BEGIN

	SELECT * FROM VW_EQUIPTO_DISPLAY_FULL where codigo = cod_equipamento;
    
END$$
DELIMITER ;
-- TESTA PROC
SET @cod_equipamento = 1;
CALL PROC_DISPLAY_EQUIPAMENTOS_FULL(@cod_equipamento);





/* ***** PROCEDURES PARA VIEW DE EMPRESAS ( Clientes Revenda ) ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_CLIENT;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_CLIENT ()

BEGIN

	-- SELECT * FROM VW_EMPRESA_DISPLAY_CLIENT;
		SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Cliente Revenda' GROUP BY emp.codigo;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_EMPRESA_DISPLAY_CLIENT;





/* ***** PROCEDURES PARA VIEW DE EMPRESAS ( Operadoras de Telefonia ) ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_TELEPHONE_OPERATOR;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_TELEPHONE_OPERATOR ()

BEGIN

	-- SELECT * FROM VW_EMPRESA_DISPLAY_TELEPHONE_OPERATOR;
		SELECT DISTINCT emp.codigo, emp.razao_social, emp.unidade, emp.nome_contato, emp.email_contato, emp.site, 
									tel.numero, tiptel.desc_tipo_telefone
									FROM telefone tel 
                                    INNER JOIN tipo_telefone tiptel ON tel.cod_tipo_telefone = tiptel.codigo
									INNER JOIN empresa emp ON emp.codigo = tel.cod_empresa
                                    INNER JOIN tipo_empresa tip_emp ON tip_emp.codigo = emp.cod_tipo_empresa
                                    WHERE tip_emp.desc_tipo = 'Operadora Telefonia' GROUP BY emp.codigo;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_EMPRESA_DISPLAY_TELEPHONE_OPERATOR;





/* ***** PROCEDURES PARA VIEW DE EMPRESAS ( Prestadores de Serviço ) ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_SERVICE_PROVIDER;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_SERVICE_PROVIDER ()

BEGIN

	SELECT * FROM VW_EMPRESA_DISPLAY_SERVICE_PROVIDER;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_EMPRESA_DISPLAY_SERVICE_PROVIDER();





/* ***** PROCEDURES PARA VIEW DE EMPRESAS ( Fabricantes ) ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_MANUFACTURER;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_MANUFACTURER ()

BEGIN

	SELECT * FROM VW_EMPRESA_DISPLAY_MANUFACTURER;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_EMPRESA_DISPLAY_MANUFACTURER();


select * from VW_EMPRESA_DISPLAY_SERVICE_PROVIDER;





/* ***** PROCEDURE PARA VIEW DE TODAS AS EMPRESAS  ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_FULL;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_FULL (IN cod_empresa INT)

BEGIN

	SELECT * FROM VW_EMPRESA_DISPLAY_FULL WHERE codigo = cod_empresa;
    
END$$
DELIMITER ;
-- TESTA PROC
SET @codigo_empresa = 10;
CALL PROC_EMPRESA_DISPLAY_FULL(@codigo_empresa);





/* ***** PROCEDURE PARA VIEW DE TODOS OS TELEFONES DA EMPRESA  ***** */

DROP PROCEDURE IF EXISTS PROC_EMPRESA_DISPLAY_PHONES;
DELIMITER $$

CREATE PROCEDURE PROC_EMPRESA_DISPLAY_PHONES (IN cons_cod_empresa INT)

BEGIN

	SELECT * FROM VW_EMPRESA_DISPLAY_PHONES WHERE cod_empresa = cons_cod_empresa;
    
END$$
DELIMITER ;
-- TESTA PROC
SET @cons_codigo_empresa = 10;
CALL PROC_EMPRESA_DISPLAY_PHONES(@cons_codigo_empresa);





/* ***** PROCEDURE PARA VIEW DE LINKS (PARCIAL)  ***** */

DROP PROCEDURE IF EXISTS PROC_LINK_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_LINK_DISPLAY ()

BEGIN

	SELECT * FROM VW_LINK_DISPLAY;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_LINK_DISPLAY;






/* ***** PROCEDURE PARA VIEW DE LINKS (TOTAL)  ***** */

DROP PROCEDURE IF EXISTS PROC_LINK_DISPLAY_FULL;
DELIMITER $$

CREATE PROCEDURE PROC_LINK_DISPLAY_FULL ()

BEGIN

	SELECT * FROM VW_LINK_DISPLAY_FULL;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_LINK_DISPLAY_FULL;





/* ***** PROCEDURE PARA VIEW DE TIPOS DE EMPRESA  ***** */

DROP PROCEDURE IF EXISTS PROC_TIPO_EMPRESA_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_TIPO_EMPRESA_DISPLAY ()

BEGIN

	SELECT * FROM VW_TIPO_EMPRESA;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_TIPO_EMPRESA_DISPLAY;





/* ***** PROCEDURE PARA VIEW DE DEPARTAMENTOS  ***** */

DROP PROCEDURE IF EXISTS PROC_DEPARTAMENTO_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_DEPARTAMENTO_DISPLAY ()

BEGIN

	SELECT * FROM VW_DEPARTAMENTO;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_DEPARTAMENTO_DISPLAY;





/* ***** PROCEDURE PARA VIEW DE TIPO DE TELEFONE  ***** */

DROP PROCEDURE IF EXISTS PROC_TIPO_TELEFONE_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_TIPO_TELEFONE_DISPLAY ()

BEGIN

	SELECT * FROM VW_TIPO_TELEFONE;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_TIPO_TELEFONE_DISPLAY;






/* ***** PROCEDURE PARA VIEW DE TIPO DE EQUIPAMENTO  ***** */

DROP PROCEDURE IF EXISTS PROC_TIPO_EQUIPAMENTO_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_TIPO_EQUIPAMENTO_DISPLAY ()

BEGIN

	SELECT * FROM VW_TIPO_EQUIPAMENTO;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_TIPO_EQUIPAMENTO_DISPLAY;





/* ***** PROCEDURE PARA VIEW MARCA  ***** */

DROP PROCEDURE IF EXISTS PROC_MARCA_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_MARCA_DISPLAY ()

BEGIN

	SELECT * FROM VW_MARCA_DISPLAY;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_MARCA_DISPLAY;






/* ***** PROCEDURE PARA VIEW ACESSO REMOTO  ***** */

DROP PROCEDURE IF EXISTS PROC_ACESSO_REMOTO_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_ACESSO_REMOTO_DISPLAY ()

BEGIN

	SELECT * FROM VW_TIPO_ACESSO_REMOTO;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_ACESSO_REMOTO_DISPLAY;





/* ***** PROCEDURE PARA VIEW SISTEMA OPERACIONAL  ***** */

DROP PROCEDURE IF EXISTS PROC_SISTEMA_OPERACIONAL_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_SISTEMA_OPERACIONAL_DISPLAY ()

BEGIN

	SELECT * FROM VW_SIST_OPERACIONAL;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_SISTEMA_OPERACIONAL_DISPLAY;






/* ***** PROCEDURE PARA VIEW MODELOS  ***** */

DROP PROCEDURE IF EXISTS PROC_MODELO_DISPLAY;
DELIMITER $$

CREATE PROCEDURE PROC_MODELO_DISPLAY ()

BEGIN

	SELECT * FROM VW_MODELO;
    
END$$
DELIMITER ;
-- TESTA PROC
CALL PROC_MODELO_DISPLAY;
