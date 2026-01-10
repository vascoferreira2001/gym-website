# Maia GYM — Website de Ginásio (Projeto Académico)

## Descrição geral

O Maia GYM é um website de ginásio desenvolvido como projeto académico, utilizando:

- PHP 8+
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript

O objetivo é simular um website de ginásio moderno, com:

- Página inicial com carousel e cards de serviços
- Sistema de marcação de aulas (Booking)
- Página de galeria de imagens (Gallery)
- Página de contacto com gravação em base de dados
- Painel de administração com CRUD

---

## Estrutura do projeto

```text
gym-website/
│
├── index.php          # Homepage com carousel e cards
├── about.php          # Página "Sobre Nós"
├── gallery.php        # Galeria com tabela responsiva
├── booking.php        # Formulário de marcação de aulas
├── contact.php        # Formulário de contacto
│
├── admin/
│   ├── index.php      # Dashboard do administrador
│   ├── list.php       # Listagem dinâmica (classes, bookings, contacts)
│   ├── insert.php     # Inserir nova aula (classes)
│   ├── edit.php       # Editar aula (classes)
│   ├── delete.php     # Apagar aulas/bookings/contacts
│
├── includes/
│   ├── header.php     # Header global (menu, Bootstrap, início do HTML)
│   ├── footer.php     # Footer global (scripts JS, fecho do HTML)
│   ├── db.php         # Ligação à base de dados MySQL
│
├── assets/
│   ├── css/
│   │   └── style.css  # Estilos personalizados (tema escuro + amarelo)
│   ├── js/
│   │   └── script.js  # JS personalizado (validações/efeitos futuros)
│   ├── images/        # Imagens do ginásio (versão final local)
│
└── sql/
    ├── gym_database.sql      # Criação das tabelas principais
    └── insert_sample_data.sql # Dados de exemplo (seed)
```

## Como usar

1. Edite os arquivos PHP, HTML, CSS e JavaScript conforme necessário.
2. Utilize o Bootstrap para o layout e componentes visuais.
3. Coloque imagens e outros recursos na pasta `assets`.
4. Importe o arquivo `gym_database.sql` para criar as tabelas no MySQL.
5. Edite o arquivo `db.php` com os dados da sua base de dados.

## Requisitos

- PHP 8+ instalado para páginas dinâmicas.
- Servidor web com suporte a PHP e MySQL (ex: XAMPP, WAMP, LAMP).
- Navegador moderno para visualização.

---

> Substitua este README conforme o projeto evoluir.
