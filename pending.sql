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

	ALTER TABLE jogos ADD COLUMN codigo_externo bigint;
COMMENT ON COLUMN jogos.codigo_externo IS 'Representa os ids dos jogos no sistema de disponibilidade.';
