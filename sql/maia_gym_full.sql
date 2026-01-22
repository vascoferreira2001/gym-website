-- ============================================================
-- BASE DE DADOS COMPLETA: MAIA GYM
-- Inclui estrutura, alterações e dados de exemplo
-- ============================================================

-- CRIAR BASE DE DADOS
CREATE DATABASE IF NOT EXISTS gym_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gym_db;

-- ============================================================
-- TABELA: users
-- ============================================================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('cliente','gestora_clientes','professor','personal_trainer','gestor_ginasio','admin','user') NOT NULL DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir utilizador admin (Gestor Principal)
INSERT INTO users (name, username, email, password, role)
VALUES ('Gestor Principal', 'admin', 'admin@gym.com', SHA2('admin123', 256), 'gestor_ginasio')
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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
-- ALTERAÇÃO DA TABELA USERS: ENUM roles
-- ============================================================
ALTER TABLE users
MODIFY COLUMN role ENUM('cliente','gestora_clientes','professor','personal_trainer','gestor_ginasio','admin','user') NOT NULL DEFAULT 'cliente';
