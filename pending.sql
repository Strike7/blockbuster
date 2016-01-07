/* Nova view de senhas espiradas */
SELECT  a.id,
	( SELECT c.email
            FROM Contas c
            WHERE c.id = a.conta_id ) email,
	s.senha,
	a.data_fim
FROM Alugueis a, Senhas s
WHERE s.conta_id = a.conta_id
  AND a.ativo = 'S'
  AND s.ativo = 'S'
  AND s.data_cadastro < a.data_fim
  AND date_trunc('day', a.data_fim) < NOW()

  /* adiciona coluna de ativo na senha */

  ALTER TABLE Senhas ADD COLUMN ativo character (1) NOT NULL DEFAULT 'A';

	ALTER TABLE jogos ADD COLUMN codigo bigint;
COMMENT ON COLUMN jogos.codigo_externo IS 'Representa os ids dos jogos no sistema de disponibilidade.';

CREATE OR REPLACE VIEW disponibilidades AS
 SELECT j.id AS jogo_id,
    j.titulo,
    c.id AS conta_id,
    c.email,
    to_char(a.data_fim::date + '1 day'::interval, 'DD/MM/YYYY'::text) AS disponivel
   FROM jogos j
     JOIN contas c ON c.jogo_id = j.id
     JOIN alugueis a ON a.conta_id = c.id AND a.ativo = 'S'::bpchar
  WHERE (a.situacao = ANY (ARRAY['U'::bpchar, 'R'::bpchar])) AND a.ativo = 'S'::bpchar AND a.data_fim::date = (( SELECT max(alugueis.data_fim)::date AS max
           FROM alugueis
          WHERE alugueis.conta_id = c.id AND (alugueis.situacao = ANY (ARRAY['R'::bpchar, 'U'::bpchar])) AND alugueis.ativo = 'S'::bpchar))
  ORDER BY j.titulo;

ALTER TABLE disponibilidades
  OWNER TO blockbuster;

CREATE OR REPLACE VIEW disponiveis AS
		SELECT  D.ID JOGO_ID, D.TITULO, MAX(D.DISPONIVEL) DISPONIVEL, MIN(D.DATA_RESERVA) DATARESERVA FROM (
		SELECT J.ID, J.TITULO, C.EMAIL,
		COALESCE( ( SELECT MAX('N') FROM ALUGUEIS L WHERE L.CONTA_ID = C.ID AND L.SITUACAO IN ('R', 'U') AND L.ATIVO = 'S' AND current_date BETWEEN date_trunc('day', L.DATA_INICIO) AND date_trunc('day', L.DATA_FIM) ), 'S') DISPONIVEL,
		( SELECT MAX(L.DATA_FIM + interval '1 day') FROM ALUGUEIS L WHERE L.CONTA_ID = C.ID AND L.SITUACAO IN ('R', 'U') AND L.ATIVO = 'S' AND current_date <= date_trunc('day', L.DATA_FIM)) DATA_RESERVA
		FROM
		JOGOS J, CONTAS C
		WHERE C.JOGO_ID = J.ID and C.TIPO = 'L'
		ORDER BY J.TITULO ) D
		GROUP BY D.ID, D.TITULO
		ORDER BY D.TITULO
ALTER TABLE disponiveis
		  OWNER TO blockbuster;
