-- ============================================================
-- INSERIR UTILIZADOR ADMINISTRADOR (Gestor Principal)
-- ============================================================

INSERT INTO users (name, email, password, role)
VALUES ('Gestor Principal', 'admin@gym.com', SHA2('admin123', 256), 'gestor_ginasio');
