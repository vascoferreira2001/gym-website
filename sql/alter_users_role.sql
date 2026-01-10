-- ============================================================
-- ALTERAÇÃO DA TABELA USERS: Adicionar/alterar coluna 'role'
-- Agora com ENUM para diferentes tipos de utilizador
-- ============================================================

ALTER TABLE users
MODIFY COLUMN role ENUM(
    'cliente',
    'gestora_clientes',
    'professor',
    'personal_trainer',
    'gestor_ginasio'
) NOT NULL DEFAULT 'cliente';
