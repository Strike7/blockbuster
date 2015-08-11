CREATE TABLE usuarios (
	id bigserial,
	nome varchar(200),

	CONSTRAINT usuarios_pk PRIMARY KEY (id)
);

CREATE TABLE jogos (
	id bigserial,
	titulo varchar(200) NOT NULL,
	categoria char(1), -- M - MAIS ALUGADOS, L - LANCAMENTO

	CONSTRAINT jogos_pk PRIMARY KEY (id)
);

CREATE TABLE contas (
	id bigserial,
	jogo_id bigint NOT NULL,
	email varchar(200) NOT NULL,

	CONSTRAINT contas_pk PRIMARY KEY (id),
	CONSTRAINT contas_jogos_fk FOREIGN KEY (jogo_id)
	  REFERENCES jogos (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE UNIQUE INDEX unique_email ON contas (email);

CREATE TABLE senhas (
	id bigserial,
	conta_id bigint NOT NULL,
	usuario_id bigint NOT NULL,
	senha varchar(20) NOT NULL,
	data_cadastro timestamp NOT NULL DEFAULT now(),

	CONSTRAINT senhas_pk PRIMARY KEY (id),
	CONSTRAINT senhas_contas_fk FOREIGN KEY (conta_id)
	  REFERENCES contas (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT senhas_usuarios_fk FOREIGN KEY (usuario_id)
	  REFERENCES usuarios (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION  
);

CREATE TABLE clientes (
	id bigserial,
	nome varchar(200) NOT NULL,
	email varchar(200) NOT NULL,
    id_google bigint, -- Link para o contato do google
    game_tag varchar(50)

	CONSTRAINT clientes_pk PRIMARY KEY (id)
);

CREATE TABLE alugueis (
	id bigserial,
	seq_aluguel bigint NOT NULL,
	cliente_id bigint NOT NULL,
	conta_id bigint NOT NULL,
	data_inicio timestamp NOT NULL,
	data_fim timestamp NOT NULL,
	situacao char(1), -- U - EM USO, R - RESERVADO, C - CANCELADO, F - FINALIZADO
	tipo char(1), -- A - Avulso, M - Mercado Livre
	data_cadastro timestamp NOT NULL DEFAULT now(),

	CONSTRAINT alugueis_pk PRIMARY KEY (id),
	CONSTRAINT alugueis_clientes_fk FOREIGN KEY (cliente_id)
	  REFERENCES clientes (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT alugueis_contas_fk FOREIGN KEY (conta_id)
	  REFERENCES contas (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION  
);
