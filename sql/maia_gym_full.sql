-- ============================================================

-- ALTERAÇÃO DA TABELA USERS: ENUM roles e novo campo identifier
-- (Já incluído na criação da tabela acima)

-- ============================================================
-- TABELA: users
-- ============================================================


CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(150) UNIQUE,
    identifier VARCHAR(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('cliente','personal_trainer','gestor_ginasio') NOT NULL DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir utilizador(Gestor Principal)
INSERT INTO users (name, username, email, password, role)
VALUES ('Gestor', 'gestor', 'gestor@gym.com', SHA2('123456', 256), 'gestor_ginasio')
ON DUPLICATE KEY UPDATE email=email;

-- Utilizadores principais para testes
INSERT INTO users (name, username, email, password, role)
VALUES ('Personal Trainer', 'pt', 'pt@gym.com', SHA2('123456', 256), 'personal_trainer')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO users (name, username, email, password, role)
VALUES ('Cliente', 'cliente', 'cliente@gym.com', SHA2('123456', 256), 'cliente')
ON DUPLICATE KEY UPDATE email=email;

-- ============================================================
-- TABELA: classes
-- ============================================================
CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    schedule VARCHAR(100),
    personal_trainer_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (personal_trainer_id) REFERENCES users(id)
);

-- Dados de exemplo para classes
INSERT INTO classes (name, description, schedule, image) VALUES
('Musculação', 'Treinos de força com máquinas e pesos livres, orientados para ganho de massa muscular.', 'Segunda, Quarta e Sexta - 18:00', 'https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg'),
('Aulas de Grupo', 'Aulas dinâmicas de grupo: CrossFit, Cycling, HIIT, entre outras.', 'Terça e Quinta - 19:00', 'https://images.pexels.com/photos/3823037/pexels-photo-3823037.jpeg'),
('Personal Trainer', 'Sessões personalizadas com acompanhamento individualizado e plano específico.', 'Horários flexíveis por marcação', 'https://images.pexels.com/photos/7676400/pexels-photo-7676400.jpeg'),
('Nutrição', 'Consultas de nutrição desportiva para otimizar desempenho e resultados.', 'Sábado - 10:00', 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg');

-- ============================================================
-- TABELA: bookings
-- ============================================================
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    notes TEXT,
    newsletter BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

-- Dados de exemplo para bookings
INSERT INTO bookings (class_id, name, email, date, time, notes, newsletter) VALUES
(1, 'João Silva', 'joao@example.com', '2026-01-15', '18:00:00', 'Primeira vez no ginásio.', 1),
(2, 'Ana Costa', 'ana@example.com', '2026-01-16', '19:00:00', 'Prefere intensidade moderada.', 0),
(3, 'Rui Santos', 'rui@example.com', '2026-01-17', '17:00:00', 'Objetivo: perda de peso.', 1),
(4, 'Marta Lopes', 'marta@example.com', '2026-01-18', '10:00:00', 'Consulta inicial de nutrição.', 1);

-- ============================================================
-- TABELA: contacts
-- ============================================================
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dados de exemplo para contacts
INSERT INTO contacts (name, email, message) VALUES
('Carlos Ferreira', 'carlos@example.com', 'Gostaria de saber preços dos planos anuais.'),
('Inês Rocha', 'ines@example.com', 'Têm aulas específicas para iniciantes?'),
('Pedro Gomes', 'pedro@example.com', 'Qual é o horário com menos afluência?');

-- ============================================================
-- ALTERAÇÃO DA TABELA USERS: Adicionar idade, telemovel, morada
-- ============================================================
ALTER TABLE users
ADD COLUMN idade INT NULL AFTER name,
ADD COLUMN telemovel VARCHAR(30) NULL AFTER email,
ADD COLUMN morada VARCHAR(255) NULL AFTER telemovel;

-- (Opcional) Atualizar utilizadores de teste para incluir estes campos
UPDATE users SET idade=35, telemovel='912345678', morada='Rua do Ginásio, Maia' WHERE role='gestor_ginasio';
UPDATE users SET idade=28, telemovel='911111111', morada='Rua dos PTs, Maia' WHERE role='personal_trainer';
UPDATE users SET idade=22, telemovel='919999999', morada='Rua dos Clientes, Maia' WHERE role='cliente';

-- ============================================================
-- ALTERAÇÃO DA TABELA USERS: ENUM roles
-- ============================================================

-- Atualizar ENUM da coluna role para apenas os cargos válidos
ALTER TABLE users
MODIFY COLUMN role ENUM('cliente','personal_trainer','gestor_ginasio') NOT NULL DEFAULT 'cliente';
