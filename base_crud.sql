drop database if exists mapeamento1;

create database mapeamento1;

use mapeamento1;

create table equipamento(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			-- cod_tipo INTEGER UNSIGNED NOT NULL,
			cod_modelo INTEGER UNSIGNED NOT NULL,
			cod_empresa INTEGER UNSIGNED NOT NULL,
			cod_departamento INTEGER UNSIGNED,
			-- cod_fornecedor INTEGER UNSIGNED,
			num_serie VARCHAR(30),
            descricao VARCHAR(30),
			cod_detalhe_rede INTEGER UNSIGNED,
			cod_detalhe_acesso INTEGER UNSIGNED,
            cod_detalhe_acesso_remoto INTEGER UNSIGNED,
			cod_detalhe_software INTEGER UNSIGNED,
            observacoes VARCHAR(5000),
			PRIMARY KEY (codigo)
);

create table tipo_equipamento(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_tipo VARCHAR(30),
			PRIMARY KEY (codigo)
);

create table marca(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_marca VARCHAR(30),
			PRIMARY KEY (codigo)
);

create table modelo(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_modelo VARCHAR(30),
			cod_marca INTEGER UNSIGNED,
            cod_tipo_equipamento INTEGER UNSIGNED,
			PRIMARY KEY (codigo),
			CONSTRAINT FK_MODELO_MARCA FOREIGN KEY (cod_marca) REFERENCES marca (codigo),
            CONSTRAINT FK_MODELO_TIPO FOREIGN KEY (cod_tipo_equipamento) REFERENCES tipo_equipamento (codigo)
);

create table sistema_operacional(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_sist VARCHAR(50),
			versao_sist VARCHAR(30),
			PRIMARY KEY (codigo)
);

create table detalhe_rede(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			mac VARCHAR(30),
			tipo_ip ENUM('DINÂMICO', 'ESTÁTICO'),
			numero_ip VARCHAR(40),
			porta VARCHAR(10),
            hostname VARCHAR(30),
            usuario VARCHAR(30),
			cod_equipamento INTEGER UNSIGNED,
			PRIMARY KEY (codigo),
			CONSTRAINT FK_DETALHE_REDE_EQUIPAMENTO FOREIGN KEY (cod_equipamento) REFERENCES equipamento (codigo) ON DELETE CASCADE
			
);



create table detalhe_acesso(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			nivel VARCHAR(30),
			login VARCHAR(30),
			senha VARCHAR(30),
			cod_equipamento INTEGER UNSIGNED,
			PRIMARY KEY (codigo),
			CONSTRAINT FK_DETALHE_ACESSO_EQUIPAMENTO FOREIGN KEY (cod_equipamento) REFERENCES equipamento (codigo) ON DELETE CASCADE
			
);

create table detalhe_software(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			cod_equipamento INTEGER UNSIGNED,
			cod_so INTEGER UNSIGNED,
            id VARCHAR(60),
            licenca VARCHAR(60),
			PRIMARY KEY (codigo),
			CONSTRAINT FK_DETALHE_SOFTWARE_EQUIPAMENTO FOREIGN KEY (cod_equipamento) REFERENCES equipamento (codigo) ON DELETE CASCADE,
			CONSTRAINT FK_DETALHE_SOFTWARE_SO FOREIGN KEY (cod_so) REFERENCES sistema_operacional (codigo)
			
);

create table tipo_empresa(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_tipo VARCHAR(30),
			PRIMARY KEY (codigo)
);

create table departamento(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			desc_departamento VARCHAR(30),
			PRIMARY KEY (codigo)
);

create table empresa(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			cod_tipo_empresa INTEGER UNSIGNED,
            cnpj VARCHAR(20),
			razao_social VARCHAR(50),
			unidade VARCHAR(30),
			endereco VARCHAR(50),
			numero VARCHAR(10),
			complemento VARCHAR(30),
            bairro VARCHAR(50),
            cidade VARCHAR(50),
            estado VARCHAR(2),
            cep VARCHAR(10),
            nome_contato VARCHAR(30),
            email_contato VARCHAR(50),
            site VARCHAR(50),
			PRIMARY KEY (codigo),
			CONSTRAINT FK_EMPRESA_TIPO FOREIGN KEY (cod_tipo_empresa) REFERENCES tipo_empresa (codigo)
            
);

create table estado(
			codigo INTEGER UNSIGNED NOT NULL,
            estado VARCHAR(25),
            uf VARCHAR(2)
);

create table tipo_telefone(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            desc_tipo_telefone VARCHAR(20),
            PRIMARY KEY (codigo)
);

create table tipo_acesso_remoto(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            desc_tipo_acesso_remoto VARCHAR(30),
            PRIMARY KEY (codigo)
);

create table telefone(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			cod_tipo_telefone INTEGER UNSIGNED,
			numero VARCHAR(20),
			cod_empresa INTEGER UNSIGNED,
			PRIMARY KEY (codigo),
			CONSTRAINT FK_TELEFONE_EMPRESA FOREIGN KEY (cod_empresa) REFERENCES empresa (codigo) ON DELETE CASCADE,
            CONSTRAINT FK_TELEFONE_TIPO FOREIGN KEY (cod_tipo_telefone) REFERENCES tipo_telefone (codigo)
			
);


create table link(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			cod_empresa INTEGER UNSIGNED NOT NULL,
            cod_fornecedor INTEGER UNSIGNED NOT NULL,
			tipo ENUM('ESTÁTICO','DINÂMICO','PPPoE'),
            contrato VARCHAR(20),
			velocidade VARCHAR(20),
			login VARCHAR(30),
			senha VARCHAR(30),
			ip VARCHAR(40),
			mascara VARCHAR(40),
			gateway VARCHAR(40),
			dns1 VARCHAR(40),
			dns2 VARCHAR(40),
			PRIMARY KEY (codigo),
			CONSTRAINT FK_LINK_EMPRESA FOREIGN KEY (cod_empresa) REFERENCES empresa (codigo)
);

create table detalhe_acesso_remoto(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			endereco VARCHAR(40),
			login VARCHAR(30),
			senha VARCHAR(30),
            porta VARCHAR(10),
            cod_tipo_acesso_remoto INTEGER UNSIGNED,
			cod_equipamento INTEGER UNSIGNED,
			PRIMARY KEY (codigo),
            CONSTRAINT FK_DETALHE_ACESSO_REMOTO_TIPO FOREIGN KEY (cod_tipo_acesso_remoto) REFERENCES tipo_acesso_remoto (codigo),
            CONSTRAINT FK_DETALHE_ACESSO_REMOTO_EQUIPAMENTO FOREIGN KEY (cod_equipamento) REFERENCES equipamento (codigo) ON DELETE CASCADE
			
);

create table usuarios(
			codigo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			usuario VARCHAR(30),
            login VARCHAR(30),
            senha VARCHAR(30),
			PRIMARY KEY (codigo)
);

-- ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_TIPO FOREIGN KEY (cod_tipo) REFERENCES tipo_equipamento (codigo);
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_MODELO FOREIGN KEY (cod_modelo) REFERENCES modelo (codigo);
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_EMPRESA FOREIGN KEY (cod_empresa) REFERENCES empresa (codigo);
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_DEPARTAMENTO FOREIGN KEY (cod_departamento) REFERENCES departamento (codigo);
-- ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_FORNECEDOR FOREIGN KEY (cod_fornecedor) REFERENCES empresa (codigo);
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_DETALHE_REDE FOREIGN KEY (cod_detalhe_rede) REFERENCES detalhe_rede (codigo) ON DELETE CASCADE;
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_DETALHE_ACESSO FOREIGN KEY (cod_detalhe_acesso) REFERENCES detalhe_acesso (codigo) ON DELETE CASCADE;
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_DETALHE_SOFTWARE FOREIGN KEY (cod_detalhe_software) REFERENCES detalhe_software (codigo) ON DELETE CASCADE;
ALTER TABLE equipamento ADD CONSTRAINT FK_EQUIPTO_DETALHE_ACESSO_REMOTO FOREIGN KEY (cod_detalhe_acesso_remoto) REFERENCES detalhe_acesso_remoto (codigo) ON DELETE CASCADE;
ALTER TABLE link ADD CONSTRAINT FK_LINK_FORNECEDOR FOREIGN KEY (cod_fornecedor) REFERENCES empresa (codigo);


INSERT INTO usuarios (usuario, login, senha) VALUES ('Padrão','test','@standard');


INSERT INTO tipo_acesso_remoto (desc_tipo_acesso_remoto) VALUES ('Anydesk');
INSERT INTO tipo_acesso_remoto (desc_tipo_acesso_remoto) VALUES ('Team Viewer');
INSERT INTO tipo_acesso_remoto (desc_tipo_acesso_remoto) VALUES ('Área Trab. Remota');

INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES ('Recepcão');
INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES ('Suporte');
INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES ('Administrativo');
INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES ('Financeiro');
INSERT INTO tipo_telefone (desc_tipo_telefone) VALUES ('Faturamento');

INSERT INTO departamento (desc_departamento) VALUES ('Recepção');
INSERT INTO departamento (desc_departamento) VALUES ('Laboratório');
INSERT INTO departamento (desc_departamento) VALUES ('Administrativo');
INSERT INTO departamento (desc_departamento) VALUES ('Financeiro');
INSERT INTO departamento (desc_departamento) VALUES ('TI');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 1');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 2');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 3');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 4');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 5');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 6');
INSERT INTO departamento (desc_departamento) VALUES ('Consultório 7');
INSERT INTO departamento (desc_departamento) VALUES ('Central de Atendimento');
INSERT INTO departamento (desc_departamento) VALUES ('Almoxarifado');

INSERT INTO tipo_empresa (desc_tipo) VALUES ('Fabricante');
INSERT INTO tipo_empresa (desc_tipo) VALUES ('Operadora Telefonia');
INSERT INTO tipo_empresa (desc_tipo) VALUES ('Prestador de Serviço');
INSERT INTO tipo_empresa (desc_tipo) VALUES ('Cliente Revenda');


INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows Server 2008', 'R2');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows Server 2012', 'Standard');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows Server 2012 Standard', 'R2 Standard');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows Server 2012 Standard', 'R2 Foundation');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows Server Standard TS', '64 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows 10', '32 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows 10', '64 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows 7', '32 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows 7', '64 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows XP Professional', '32 bits');
INSERT INTO sistema_operacional (desc_sist, versao_sist) VALUES ('Windows XP Professional', '64 bits');

INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Servidor');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Desktop');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Laptop');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Roteador');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Load Balance');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Switch');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Print Server');
INSERT INTO tipo_equipamento (desc_tipo) VALUES ('Impressora');

INSERT INTO marca (desc_marca) VALUES ('DELL');
INSERT INTO marca (desc_marca) VALUES ('CISCO');
INSERT INTO marca (desc_marca) VALUES ('DLink');
INSERT INTO marca (desc_marca) VALUES ('Intelbras');
INSERT INTO marca (desc_marca) VALUES ('Bluepex');
INSERT INTO marca (desc_marca) VALUES ('HP');
INSERT INTO marca (desc_marca) VALUES ('Brother');
INSERT INTO marca (desc_marca) VALUES ('Lexmark');
INSERT INTO marca (desc_marca) VALUES ('Desconhecido');

INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('Optiplex 620', 1, 2);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('Optiplex 380', 1, 2);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('PowerEdge R520', 1, 1);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('PowerEdge R430', 1, 1);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('PowerEdge T130', 1, 1);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('Vostro', 1, 3);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('Genérico', 9, 2);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('P1005', 6, 8);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('MFC-L6702 DW', 7, 8);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('X264dn XL', 8, 8);
INSERT INTO modelo (desc_modelo, cod_marca, cod_tipo_equipamento) VALUES ('DCP-L5652 DN', 7, 8);

INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (1, '', 'DELL', 'Fabrica SP', 'Av. da Emancipação', '5000', '', 'Parque dos Pinheiros', 'Hortolândia', 'SP', '13184-654', '', '', 'http://dell.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (1, '', 'Bluepex', 'BackOffice', 'Rua Wilsom Vitório Coleta', '157', '', 'Jd. Maria Buchi Modeneis', 'Limeira', 'SP', '13482-225', '', 'falecom@bluepex.com', 'http://bluepex.com');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (1, '', 'Fabricante Desconhecido', '', '', '', ' ', '', 'São Paulo', 'SP', '', '', '', '');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (3, '', 'Revenda Informatica', 'SP', 'Rua Casa do Ator', '655', '', 'Vila Olimpia', 'São Paulo', 'SP', '04546-002', 'Contato', 'contato@revendainformatica.com.br', 'http://revendainformatica.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (3, '', 'Prestador Fictício', 'SP', 'Av. Rebouças', '268', '', 'Jardins', 'São Paulo', 'SP', '00000-000', '', 'contato@empresaficticia.com.br', 'http://site.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (2, '', 'NET', '', '', '', '', '', 'São Paulo', 'SP', '', '', '', 'http://net.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (2, '', 'EMBRATEL', '', '', '', '', '', 'São Paulo', 'SP', '', '', '', 'http://embratel.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (2, '', 'TIM', '', '', '', '', '', 'São Paulo', 'SP', '', '', '', 'http://tim.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (2, '', 'VIVO', '', '', '', '', '', 'São Paulo', 'SP', '', '', '', 'http://vivo.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (4, '00.000.000/0000-00', 'CLiente 1', 'Matriz', 'Av. Nove de Julho', '0000', 'CJ 44', 'Jardim Paulista', 'São Paulo', 'SP', '00000-000', 'Contato', 'contato@contato.com.br', 'http://site.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (4, '', 'Cliente 2', 'Santa Cecília', 'Rua Fictícia', '000', 'Cj 22', 'Sta. Cecília', 'São Paulo', 'SP', '', 'Juliana', 'recepcao@cliente2.com.br', 'http://sitecliente2.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (4, '', 'Cliente 3', 'Lapa', 'Rua Clélia', '000', 'Cj 000', 'Lapa', 'São Paulo', 'SP', '', 'Arlete', 'arlete@cliente3.com.br', 'http://sitecliente3.com.br');
INSERT INTO empresa (cod_tipo_empresa, cnpj, razao_social, unidade, endereco, numero, complemento, bairro, cidade, estado, cep, nome_contato, email_contato, site) VALUES (4, '', 'TESTE', 'TESTE', 'TESTE', 'TESTE', 'TESTE', 'TESTE', 'TESTE', 'SP', '', 'TESTE', 'teste@teste.com.br', 'teste');

INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '0800 970 3355',1);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '(19) 3404-6505',2);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '(11) 3846-4949',4);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '(11) 00000-00000',5);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '10621',6);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '0800 721 1021',7);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '1056',8);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, '1058',9);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (1, '(11) 0000-0000',10);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (3, '(11) 0000-0000',10);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (1, '(11) 0000-0000',11);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (1, '(11) 00000-0000',12);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (5, '(11) 00000-0000',12);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (1, 'TESTE',13);
INSERT INTO telefone (cod_tipo_telefone, numero, cod_empresa) VALUES (2, 'TESTE',13);

INSERT INTO estado (codigo, estado, UF) VALUES (1,'Acre','AC');
INSERT INTO estado (codigo, estado, UF) VALUES (2,'Alagoas','AL');
INSERT INTO estado (codigo, estado, UF) VALUES (3,'Amapá','AP');
INSERT INTO estado (codigo, estado, UF) VALUES (4,'Amazonas','AM');
INSERT INTO estado (codigo, estado, UF) VALUES (5,'Bahia','BA');
INSERT INTO estado (codigo, estado, UF) VALUES (6,'Ceará','CE');
INSERT INTO estado (codigo, estado, UF) VALUES (7,'Distrito Federal','DF');
INSERT INTO estado (codigo, estado, UF) VALUES (8,'Espírito Santo','ES');
INSERT INTO estado (codigo, estado, UF) VALUES (9,'Goiás','GO');
INSERT INTO estado (codigo, estado, UF) VALUES (10,'Maranhão','MA');
INSERT INTO estado (codigo, estado, UF) VALUES (11,'Mato Grosso','MT');
INSERT INTO estado (codigo, estado, UF) VALUES (12,'Mato Grosso do Sul','MS');
INSERT INTO estado (codigo, estado, UF) VALUES (13,'Minas Gerais','MG');
INSERT INTO estado (codigo, estado, UF) VALUES (14,'Pará','PA');
INSERT INTO estado (codigo, estado, UF) VALUES (15,'Paraíba','PB');
INSERT INTO estado (codigo, estado, UF) VALUES (16,'Paraná','PR');
INSERT INTO estado (codigo, estado, UF) VALUES (17,'Pernambuco','PE');
INSERT INTO estado (codigo, estado, UF) VALUES (18,'Piauí','PI');
INSERT INTO estado (codigo, estado, UF) VALUES (19,'Rio de Janeiro','RJ');
INSERT INTO estado (codigo, estado, UF) VALUES (20,'Rio Grande do Norte','RN');
INSERT INTO estado (codigo, estado, UF) VALUES (21,'Rio Grande do Sul','RS');
INSERT INTO estado (codigo, estado, UF) VALUES (22,'Rondônia','RO');
INSERT INTO estado (codigo, estado, UF) VALUES (23,'Roraima','RR');
INSERT INTO estado (codigo, estado, UF) VALUES (24,'Santa Catarina','SC');
INSERT INTO estado (codigo, estado, UF) VALUES (25,'São Paulo','SP');
INSERT INTO estado (codigo, estado, UF) VALUES (26,'Sergipe','SE');
INSERT INTO estado (codigo, estado, UF) VALUES (27,'Tocantins','TO');

INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (4, 9, 'DINÂMICO', '', 'NÃO INFORMADO', '', '', 'NÃO INFORMADO', '', '', '', '');
INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (10, 6, 'ESTÁTICO', '', '30 MB', '', '', '000.0.000.000', '', '', '', '');
INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (10, 6, 'ESTÁTICO', '', '120 MB', '', '', '', '', '', '', '');
INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (10, 7, 'ESTÁTICO', 'SPO/MULTI/0000', '', '', '', '000.00.000.00', '', '', '', '');
INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (11, 8, 'ESTÁTICO', '', '', '', '', '000.000.000.000', '', '', '', '');
INSERT INTO link (cod_empresa, cod_fornecedor, tipo, contrato, velocidade, login, senha, ip, mascara, gateway, dns1, dns2) VALUES (12, 8, 'ESTÁTICO', '', '', '', '', '000.000.000.000', '', '', '', '');

/* Input Equipamento Revenda */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (6, 4, 5, 'Não Informado', 'Laptop Padrão','');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('Não Informado', 'ESTÁTICO', 'Não Informado', '', '', '',1);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('', '', '',1);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('', '', '', '', 3, 1);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (1, 3, 'Não Informado', 'Not Found');
UPDATE equipamento SET cod_detalhe_rede = 1, cod_detalhe_acesso = 1, cod_detalhe_acesso_remoto = 1, cod_detalhe_software = 1 WHERE codigo = 1;

/* Input SQL SERVER */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (3, 10, 5, 'NUMSERIE', 'Servidor SQL','Servidor SQL');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'SERVERSQL', 'TI',2);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',2);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('192.168.0.0', 'DOMINIO\\conta', 'Password', '', 3, 2);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (2, 3, '0000-00000-00000-00000', 'Not Found');
UPDATE equipamento SET cod_detalhe_rede = 2, cod_detalhe_acesso = 2, cod_detalhe_acesso_remoto = 2, cod_detalhe_software = 2 WHERE codigo = 2;

/* Input AD e SQL Backup */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (4, 10, 5, 'xxxxxx ', 'AD e Backup SQL', 'Possui pastas mapeadas o Faturamento e Almoxarifado');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'SERVERAD', 'TI',3);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',3);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('192.168.0.0', 'DOMINIO\\conta', 'Password', '', 3, 3);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (3, 3, '00000-00000-00000-00000', '00000-00000-00000-00000-00000');
UPDATE equipamento SET cod_detalhe_rede = 3, cod_detalhe_acesso = 3, cod_detalhe_acesso_remoto = 3, cod_detalhe_software = 3 WHERE codigo = 3;

/* Input Servidor AAA */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (5, 10, 5, 'XXXXXX ', 'Servidor AA', 'Servidor AA - Fora do domínio - Acesso pela Conta Local:comunicação entre AA e Módulo A2. ');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'SERVERAA', 'TI',4);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',4);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('0.0.0.0', 'DOMINIO\\conta', 'Password', '', 3, 4);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (4, 4, '00000-00000-00000-00000', '00000-00000-00000-00000-00000');
UPDATE equipamento SET cod_detalhe_rede = 4, cod_detalhe_acesso = 4, cod_detalhe_acesso_remoto = 4, cod_detalhe_software = 4 WHERE codigo = 4;

/* Input Servidor Aplicação G*/
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (7, 10, 5,' ', 'APLICACAOG', 'Devem estar instaladas as Impressoras de Protocolo');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'APLICACAOG', 'TI',5);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',5);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('0.0.0.0', 'DOMINIO\\conta', 'Password', '', 3, 5);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (5, 8, '', '');
UPDATE equipamento SET cod_detalhe_rede = 5, cod_detalhe_acesso = 5, cod_detalhe_acesso_remoto = 5, cod_detalhe_software = 5 WHERE codigo = 5;

/* Input Servidor APLICACAO TJ */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (7, 10, 5, ' ', 'Sevidor TJ','Fora do Domínio. Acesso por conta local.');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'SERVIDORTJ', 'TI',6);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',6);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('0.0.0.0', 'DOMINIO\\conta', 'Password', '', 3, 6);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (6, 9, '', '');
UPDATE equipamento SET cod_detalhe_rede = 6, cod_detalhe_acesso = 6, cod_detalhe_acesso_remoto = 6, cod_detalhe_software = 6 WHERE codigo = 6;

/* Input Servidor WDF */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (7, 10, 5, ' ', 'Servidor WDF','Usado por pela empresa vvvvv');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'SERVERWDF', 'TI',7);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',7);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('0.0.0.0', 'DOMINIO\\conta', 'Password', '', 3, 7);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (7, 5, '00000-000-000000-00000', '');
UPDATE equipamento SET cod_detalhe_rede = 7, cod_detalhe_acesso = 7, cod_detalhe_acesso_remoto = 7, cod_detalhe_software = 7 WHERE codigo = 7;

/* Input Servidor AltGw */
INSERT INTO equipamento (cod_modelo, cod_empresa, cod_departamento, num_serie, descricao, observacoes) VALUES (7, 10, 5, ' ', 'Servidor AltGw','Roda Aplicação GW. Faz a interface entre xxx e xxx');
INSERT INTO detalhe_rede (mac, tipo_ip, numero_ip, porta, hostname, usuario, cod_equipamento) VALUES ('AA-AA-AA-AA-AA-AA', 'ESTÁTICO', '0.0.0.0', '', 'ALTGWSRV', 'TI',8);
INSERT INTO detalhe_acesso (nivel, login, senha, cod_equipamento) VALUES ('Administrador', 'DOMINIO\\conta', 'Password',8);
INSERT INTO detalhe_acesso_remoto (endereco, login, senha, porta, cod_tipo_acesso_remoto, cod_equipamento) VALUES ('0.0.0.0', 'DOMINIO\\conta', 'Password', '', 3, 8);
INSERT INTO detalhe_software (cod_equipamento, cod_so, id, licenca) VALUES (8, 10, 'Não Informado', 'Não Informado');
UPDATE equipamento SET cod_detalhe_rede = 8, cod_detalhe_acesso = 8, cod_detalhe_acesso_remoto = 8, cod_detalhe_software = 8 WHERE codigo = 8;



