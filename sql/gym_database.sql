-- gym_database.sql
-- ============================================================
-- BASE DE DADOS DO PROJETO - GINÁSIO
-- ============================================================

-- Criar a base de dados (caso não exista)
CREATE DATABASE IF NOT EXISTS gym_db;
USE gym_db;

-- ============================================================
-- TABELA: classes
-- Guarda as aulas disponíveis no ginásio
-- ============================================================
CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Identificador único da aula
    name VARCHAR(100) NOT NULL,            -- Nome da aula (ex: "CrossFit", "Yoga")
    description TEXT,                       -- Descrição detalhada da aula
    schedule VARCHAR(100),                  -- Horário (ex: "Segunda 18:00")
    image VARCHAR(255)                      -- Caminho da imagem da aula
);

-- ============================================================
-- TABELA: bookings
-- Guarda as marcações feitas pelos utilizadores
-- ============================================================
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Identificador único da reserva
    class_id INT NOT NULL,                 -- Aula escolhida (ligação à tabela classes)
    name VARCHAR(100) NOT NULL,            -- Nome do utilizador
    email VARCHAR(150) NOT NULL,           -- Email do utilizador
    date DATE NOT NULL,                    -- Data da aula
    time TIME NOT NULL,                    -- Hora da aula
    notes TEXT,                            -- Observações opcionais
    newsletter BOOLEAN DEFAULT 0,          -- Se o utilizador quer receber novidades
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da criação da reserva

    -- Chave estrangeira: liga a reserva à aula
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

-- ============================================================
-- TABELA: contacts
-- Guarda mensagens enviadas pelo formulário de contacto
-- ============================================================
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Identificador único da mensagem
    name VARCHAR(100) NOT NULL,            -- Nome do utilizador
    email VARCHAR(150) NOT NULL,           -- Email do utilizador
    message TEXT NOT NULL,                 -- Mensagem enviada
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data da submissão
);

-- ============================================================
-- TABELA: users
-- Guarda os administradores do painel Admin
-- ============================================================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Identificador único do admin
    email VARCHAR(150) NOT NULL UNIQUE,    -- Email de login
    password VARCHAR(255) NOT NULL         -- Password encriptada
);

-- Inserir um admin padrão (password: admin123)
INSERT INTO users (email, password)
VALUES ('admin@gym.com', SHA2('admin123', 256));
CREATE DATABASE IF NOT EXISTS gym_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gym_db;

-- Tabela de utilizadores (admin e futuros utilizadores)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único
    username VARCHAR(50) NOT NULL UNIQUE, -- Nome de utilizador
    password VARCHAR(255) NOT NULL, -- Password encriptada
    role ENUM('admin','user') DEFAULT 'user', -- Tipo de utilizador
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data de criação
);

-- Inserção de utilizador admin (password: admin123 encriptada)
-- Recomenda-se alterar a password após instalação
INSERT INTO users (username, password, role) VALUES (
    'admin',
    '$2y$10$e0NRwQwQwQwQwQwQwQwQwOe0NRwQwQwQwQwQwQwQwQwQwQwQwQw', -- Exemplo de hash bcrypt
    'admin'
);

-- Tabela de aulas/classes disponíveis no ginásio
CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único
    name VARCHAR(100) NOT NULL, -- Nome da aula
    description TEXT, -- Descrição da aula
    image VARCHAR(255), -- Caminho da imagem
    schedule VARCHAR(100), -- Horário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data de criação
);

-- Tabela de reservas/bookings
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único
    class_id INT NOT NULL, -- Aula reservada
    name VARCHAR(100) NOT NULL, -- Nome do cliente
    email VARCHAR(100) NOT NULL, -- Email do cliente
    phone VARCHAR(20), -- Telefone
    booking_date DATE NOT NULL, -- Data da reserva
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE -- Ligação à tabela de aulas
);

-- Tabela de contactos enviados pelo formulário
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único
    name VARCHAR(100) NOT NULL, -- Nome do contacto
    email VARCHAR(100) NOT NULL, -- Email
    message TEXT NOT NULL, -- Mensagem
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data de envio
);

-- Exemplos de inserção de aulas/classes
INSERT INTO classes (name, description, image, schedule) VALUES
('Yoga', 'Aula de relaxamento e flexibilidade', 'assets/images/yoga.jpg', 'Segunda 18:00'),
('Crossfit', 'Treino funcional de alta intensidade', 'assets/images/crossfit.jpg', 'Quarta 19:00'),
('Spinning', 'Aula de ciclismo indoor', 'assets/images/spinning.jpg', 'Sexta 20:00'),
('Pilates', 'Fortalecimento muscular e postura', 'assets/images/pilates.jpg', 'Sábado 10:00');

-- Fim do script
