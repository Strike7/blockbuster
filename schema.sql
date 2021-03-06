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
  tipo char(1), -- S - Assinatura, L - Locação
	user_id bigint, -- Usuário respońsável pelo jogo

	CONSTRAINT contas_pk PRIMARY KEY (id),
	CONSTRAINT contas_jogos_fk FOREIGN KEY (jogo_id)
	  REFERENCES jogos (id) MATCH SIMPLE
	  ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT contas_users_fk FOREIGN KEY (user_id)
	  REFERENCES users (id) MATCH SIMPLE
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
	tipo char(1), -- A - Avulso, M - Mercado Livre, S - Assinatura
	data_cadastro timestamp NOT NULL DEFAULT now(),
	ativo char(1), -- S - Sim
	mail varchar(200), -- id de confirmacao de envio de conta
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
	WHERE A.SITUACAO IN ('U', 'R') AND A.ATIVO = 'S'
		AND CAST(A.DATA_FIM AS DATE) = (SELECT CAST(MAX(DATA_FIM) AS DATE) FROM ALUGUEIS WHERE CONTA_ID = C.ID
					AND SITUACAO IN ('R','U') AND ATIVO = 'S')
	ORDER BY J.TITULO;

CREATE VIEW disponiveis AS
	SELECT DISTINCT
		J.ID TITULO_ID,
	   	J.TITULO
	FROM JOGOS J
	INNER JOIN CONTAS C ON C.JOGO_ID = J.ID
	WHERE C.ID NOT IN (SELECT CONTA_ID FROM ALUGUEIS WHERE ATIVO =  'S'
		AND SITUACAO IN ('U', 'R') AND CAST(DATA_FIM AS DATE) >= CAST(NOW() AS DATE))
		AND C.ID NOT IN (SELECT CONTA_ID FROM SENHAS_EXPIRADAS)
	ORDER BY J.TITULO;

CREATE OR REPLACE FUNCTION contas_ultima_senha(p_conta_id bigint)
  RETURNS date AS
  $BODY$
    DECLARE
      data TIMESTAMP;
    BEGIN
        SELECT CAST(data_cadastro AS DATE) INTO data FROM senhas WHERE conta_id = p_conta_id
        		ORDER BY DATA_CADASTRO DESC LIMIT 1;

        RETURN data;
    END;
  $BODY$
  LANGUAGE plpgsql VOLATILE;

CREATE OR REPLACE FUNCTION contas_ultimo_aluguel(p_conta_id bigint)
  RETURNS date AS
  $BODY$
    DECLARE
      data TIMESTAMP;
    BEGIN
        SELECT CAST(data_fim AS DATE) INTO data
        FROM alugueis
        WHERE conta_id = p_conta_id
        	AND ATIVO = 'S' AND SITUACAO IN ('U', 'F')
        ORDER BY data_fim DESC LIMIT 1;

        RETURN data;
    END;
  $BODY$
  LANGUAGE plpgsql VOLATILE;

CREATE VIEW SENHAS_EXPIRADAS AS
	SELECT J.ID TITULO_ID,
		J.TITULO,
		C.ID CONTA_ID,
		C.EMAIL,
		S.SENHA,
		TO_CHAR(CONTAS_ULTIMO_ALUGUEL(C.ID), 'DD/MM/YYYY') EXPIROU
	FROM JOGOS J
	INNER JOIN CONTAS C ON C.JOGO_ID = J.ID
	INNER JOIN SENHAS S ON S.CONTA_ID = C.ID
	WHERE CAST(CONTAS_ULTIMO_ALUGUEL(C.ID) AS DATE) < CAST(NOW() AS DATE)
	 AND CONTAS_ULTIMO_ALUGUEL(C.ID) > CONTAS_ULTIMA_SENHA(C.ID)
	 AND CAST(S.DATA_CADASTRO AS DATE) = (SELECT CAST(MAX(DATA_CADASTRO) AS DATE) FROM SENHAS WHERE CONTA_ID = C.ID );
