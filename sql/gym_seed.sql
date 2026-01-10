-- ============================================================
-- DADOS DE EXEMPLO PARA O PROJETO GOGYM
-- Este ficheiro insere registos de teste nas tabelas:
-- - classes
-- - bookings
-- - contacts
-- - users (se necessário)
-- ============================================================

USE gym_db;

-- ------------------------------------------------------------
-- TABELA: classes
-- Aulas disponíveis no ginásio
-- ------------------------------------------------------------

INSERT INTO classes (name, description, schedule, image) VALUES
('Musculação',
 'Treinos de força com máquinas e pesos livres, orientados para ganho de massa muscular.',
 'Segunda, Quarta e Sexta - 18:00',
 'https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg'),

('Aulas de Grupo',
 'Aulas dinâmicas de grupo: CrossFit, Cycling, HIIT, entre outras.',
 'Terça e Quinta - 19:00',
 'https://images.pexels.com/photos/3823037/pexels-photo-3823037.jpeg'),

('Personal Trainer',
 'Sessões personalizadas com acompanhamento individualizado e plano específico.',
 'Horários flexíveis por marcação',
 'https://images.pexels.com/photos/7676400/pexels-photo-7676400.jpeg'),

('Nutrição',
 'Consultas de nutrição desportiva para otimizar desempenho e resultados.',
 'Sábado - 10:00',
 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg');

-- ------------------------------------------------------------
-- TABELA: bookings
-- Marcações de aulas
-- ------------------------------------------------------------

INSERT INTO bookings (class_id, name, email, date, time, notes, newsletter) VALUES
(1, 'João Silva', 'joao@example.com', '2026-01-15', '18:00:00', 'Primeira vez no ginásio.', 1),
(2, 'Ana Costa', 'ana@example.com', '2026-01-16', '19:00:00', 'Prefere intensidade moderada.', 0),
(3, 'Rui Santos', 'rui@example.com', '2026-01-17', '17:00:00', 'Objetivo: perda de peso.', 1),
(4, 'Marta Lopes', 'marta@example.com', '2026-01-18', '10:00:00', 'Consulta inicial de nutrição.', 1);

-- ------------------------------------------------------------
-- TABELA: contacts
-- Mensagens de contacto
-- ------------------------------------------------------------

INSERT INTO contacts (name, email, message) VALUES
('Carlos Ferreira', 'carlos@example.com', 'Gostaria de saber preços dos planos anuais.'),
('Inês Rocha', 'ines@example.com', 'Têm aulas específicas para iniciantes?'),
('Pedro Gomes', 'pedro@example.com', 'Qual é o horário com menos afluência?');

-- ------------------------------------------------------------
-- TABELA: users
-- Admin do painel
-- (Caso ainda não exista o registo base)
-- ------------------------------------------------------------

INSERT INTO users (email, password)
SELECT 'admin@gym.com', SHA2('admin123', 256)
WHERE NOT EXISTS (
    SELECT 1 FROM users WHERE email = 'admin@gym.com'
);
