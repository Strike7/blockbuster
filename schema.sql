CREATE TABLE users (
    id bigserial,
    username varchar(50),
    password varchar(255),
    role varchar(20),
    created timestamp DEFAULT now(),
    modified timestamp DEFAULT now(),

    CONSTRAINT users_pk PRIMARY KEY (id)
);

CREATE TABLE jogos (
	id bigserial,
	titulo varchar(200) NOT NULL,
	categoria char(1), -- M - MAIS ALUGADOS, L - LANCAMENTO, N - NORMAL, E - ECONOMICO

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
	user_id bigint NOT NULL,
	senha varchar(20) NOT NULL,
	data_cadastro timestamp NOT NULL DEFAULT now(),

	CONSTRAINT senhas_pk PRIMARY KEY (id),
	CONSTRAINT senhas_contas_fk FOREIGN KEY (conta_id)
	  REFERENCES contas (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT senhas_users_fk FOREIGN KEY (user_id)
	  REFERENCES users (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION  
);

CREATE TABLE clientes (
	id bigserial,
	nome varchar(200) NOT NULL,
	email varchar(200) NOT NULL,
    id_google bigint, -- Link para o contato do google
    game_tag varchar(50),

	CONSTRAINT clientes_pk PRIMARY KEY (id)
);

CREATE TABLE alugueis (
	id bigserial,
	id_pai bigint,
	cliente_id bigint NOT NULL,
	conta_id bigint NOT NULL,
	data_inicio timestamp NOT NULL,
	data_fim timestamp NOT NULL,
	situacao char(1), -- U - EM USO, R - RESERVADO, C - CANCELADO, F - FINALIZADO
	tipo char(1), -- A - Avulso, M - Mercado Livre
	data_cadastro timestamp NOT NULL DEFAULT now(),
	ativo char(1), -- S - Sim

	CONSTRAINT alugueis_pk PRIMARY KEY (id),
	CONSTRAINT alugueis_clientes_fk FOREIGN KEY (cliente_id)
	  REFERENCES clientes (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT alugueis_contas_fk FOREIGN KEY (conta_id)
	  REFERENCES contas (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION  
);

CREATE OR REPLACE FUNCTION alugueis_remove_ativo()
  RETURNS trigger AS
  $BODY$
    BEGIN
        UPDATE alugueis SET ativo = null
        WHERE id = NEW.id_pai;

        RETURN NEW;
    END;
  $BODY$
  LANGUAGE plpgsql VOLATILE;

CREATE TRIGGER alugueis_remove_ativo_tg
  AFTER INSERT
  ON alugueis
  FOR EACH ROW
  EXECUTE PROCEDURE alugueis_remove_ativo();

CREATE VIEW disponibilidades AS
	SELECT 
		J.ID TITULO_ID,
		J.TITULO,
	    C.ID CONTA_ID,
	    C.EMAIL, 
	    TO_CHAR((CAST(A.DATA_FIM AS DATE) + INTERVAL '1 DAYS'), 'DD/MM/YYYY') DISPONIVEL
	FROM JOGOS J
	INNER JOIN CONTAS C ON C.JOGO_ID = J.ID
	INNER JOIN ALUGUEIS A ON A.CONTA_ID = C.ID AND A.ATIVO = 'S'
	WHERE A.SITUACAO IN ('U', 'R') AND A.DATA_FIM = (SELECT MAX(DATA_FIM) FROM ALUGUEIS WHERE CONTA_ID = C.ID)
	ORDER BY J.TITULO;

CREATE VIEW disponiveis AS
	SELECT DISTINCT
		J.ID TITULO_ID,
	   	J.TITULO
	FROM JOGOS J
	INNER JOIN CONTAS C ON C.JOGO_ID = J.ID
	WHERE C.ID NOT IN (SELECT CONTA_ID FROM ALUGUEIS WHERE ATIVO =  'S' 
		AND SITUACAO IN ('U', 'R') AND CAST(DATA_FIM AS DATE) >= CAST(NOW() AS DATE))
	ORDER BY J.TITULO;

CREATE OR REPLACE FUNCTION contas_ultima_senha(p_conta_id bigint)
  RETURNS timestamp AS
  $BODY$
    DECLARE 
      data TIMESTAMP;
    BEGIN
        SELECT data_cadastro INTO data FROM senhas WHERE conta_id = p_conta_id
        		ORDER BY DATA_CADASTRO DESC LIMIT 1;

        RETURN data;
    END;
  $BODY$
  LANGUAGE plpgsql VOLATILE;

CREATE OR REPLACE FUNCTION contas_ultimo_aluguel(p_conta_id bigint)
  RETURNS timestamp AS
  $BODY$
    DECLARE 
      data TIMESTAMP;
    BEGIN
        SELECT data_fim INTO data FROM alugueis WHERE conta_id = p_conta_id
        		ORDER BY data_fim DESC LIMIT 1;

        RETURN data;
    END;
  $BODY$
  LANGUAGE plpgsql VOLATILE;
  

