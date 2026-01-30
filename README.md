
# Maia GYM — Website de Ginásio (Projeto Académico)

## Descrição geral

O Maia GYM é um website de ginásio moderno, desenvolvido como projeto académico, que simula a presença digital de um ginásio real. O projeto utiliza:

- **PHP 8+** (backend dinâmico)
- **MySQL** (base de dados)
- **HTML5, CSS3, Bootstrap 5** (frontend responsivo)
- **JavaScript** (validações, interações)


## Funcionalidades completas da plataforma Maia GYM

### Funcionalidades públicas (acesso sem login)
- Visualização da homepage com carousel de 4 imagens e cards de serviços (com botão expand/collapse)
- Consulta de informações institucionais (Sobre Nós)
- Visualização da galeria de imagens do ginásio
- Consulta de contactos e envio de mensagens pelo formulário de contacto (com validação JS)
- Consulta de horários e modalidades de aulas (página de aulas marcadas)
- Links rápidos para redes sociais e navegação intuitiva

### Funcionalidades de marcação e contacto
- Validação de todos os campos dos formulários em tempo real (JS)
- Feedback visual de erros e sucesso nos formulários

### Área reservada do gestor de ginásio
 - Dashboard com resumo e navegação rápida
 - Gestão de aulas (criar, editar, eliminar)
 - Gestão de personal trainers (criar, editar, eliminar)
 - Gestão de clientes (criar, editar, eliminar)
 - Gestão de marcações de aulas
 - Gestão de mensagens de contacto
 -  Utilização de Bootstrap 5 via CDN para performance

### Área reservada do personal trainer
 - Criação de novas aulas
 - Listagem das suas aulas
 - Consulta de inscrições nas suas aulas

### Área reservada do cliente
 - Marcação de aulas
 - Consulta e cancelamento das suas marcações
 - Sócio → Login → Consulta aulas disponíveis, inscreve-se, consulta marcações

### Segurança e boas práticas
- Proteção de páginas reservadas por sessão PHP
- Validação de dados no frontend (JS) e backend (PHP)
- Passwords encriptadas na base de dados

### area-reservada/

**dashboard.php**: Dashboard dinâmico para gestor, personal trainer e cliente.
**gerir_aulas.php**: Gestão de aulas (listar, editar, eliminar).
**criar_aula.php**: Criar nova aula.
**editar_aula.php**: Editar aula existente.
**ver_personal_trainers.php**: Listar, criar, editar e eliminar personal trainers.
**editar_pt.php**: Editar dados de personal trainer.
**ver_clientes.php**: Listar, criar, editar e eliminar clientes.
**editar_cliente.php**: Editar dados de cliente.
**mensagens_contacto.php**: Gestão de mensagens de contacto.
**marcar_aula.php**: Processamento da marcação de aula pelo cliente.
**registar.php**: Registo de novos clientes.
**recuperar.php**: Recuperação de password.
**login.php**: Login para área reservada.
- Redirecionamento seguro após login/logout

---


Permitem a autenticação de utilizadores (gestor, personal trainer, cliente). O login direciona para a área reservada conforme o perfil do utilizador.

## O que faz cada página

### assets/
**css/style.css**: Estilos personalizados do site, com comentários por secção.
**js/script.js**: JS único do projeto, com validações, interações e comentários detalhados.
**images/**: Imagens do ginásio e galeria (inclui pasta gallery/ com imagens reais).

### sql/
**maia_gym_full.sql**: Script SQL para criar todas as tabelas e inserir dados de exemplo (inclui utilizadores de teste, aulas e bookings).
Página institucional com a história, missão e valores do Maia GYM. Inclui texto descritivo e imagens ilustrativas, além de um botão para contactar o ginásio.

## Organização do JavaScript e CSS

- **assets/js/script.js**: ficheiro único JS, com comentários detalhados. Inclui:
    - Validação de formulários (contacto, marcação de aulas, registo)
    - Inicialização de carousels (caso existam)
    - Pode ser expandido para outras interações globais
- **assets/css/style.css**: todos os estilos customizados, organizados por secção (navbar, hero, cards, etc), com comentários.
7. Faça login como gestor, personal trainer ou cliente para aceder à área reservada.

## Credenciais de Teste

- **Gestor:**
    - Email: `gestor@gym.com`
    - Password: `123456`

- **Personal Trainer:**
    - Email: `pt@gym.com`
    - Password: `123456`

- **Cliente:**
    - Email: `cliente@gym.com`
    - Password: `123456`

**insert.php**: Formulário para inserir novas aulas (classes) na base de dados.

## Observações finais

- Todo o código está comentado detalhadamente (PHP, JS, CSS e HTML) para facilitar a avaliação académica, conforme solicitado no enunciado do projeto.
- O projeto segue as melhores práticas de responsividade, acessibilidade e organização de ficheiros.
- Estrutura modular, navegação intuitiva e funcionalidades completas para cada perfil.
- Qualquer dúvida ou sugestão, contactar o autor.

### area-reservada/
Páginas reservadas a professores e sócios, com funcionalidades específicas para cada perfil (ex: ver marcações, gerir aulas).

### includes/
**header.php**: Cabeçalho global, inclui o menu de navegação e carrega o Bootstrap.
**footer.php**: Rodapé global, inclui scripts JS e fecha o HTML.
**db.php**: Ficheiro de ligação à base de dados MySQL.

### assets/
**css/style.css**: Estilos personalizados do site, com comentários por secção.
**js/script.js**: JS único do projeto, com validações, interações e comentários detalhados.
**images/**: Imagens do ginásio e galeria.

### sql/
**maia_gym_full.sql**: Script SQL para criar todas as tabelas e inserir dados de exemplo.


## Organização do JavaScript e CSS

- **assets/js/script.js**: ficheiro único JS, com comentários detalhados. Inclui:
    - Validação de formulários (contacto, booking)
    - Inicialização de carousels (caso existam)
    - Pode ser expandido para outras interações globais
- **assets/css/style.css**: todos os estilos customizados, organizados por secção (navbar, hero, cards, etc), com comentários.


## Credenciais de Teste

- **Gestor:**
    - Email: `gestor@gym.com`
    - Password: `123456`

- **Personal Trainer:**
    - Email: `pt@gym.com`
    - Password: `123456`    

- **Cliente:**
    - Email: `cliente@gym.com`
    - Password: `123456`

## Requisitos

- PHP 8+ instalado para páginas dinâmicas.
- Servidor web com suporte a PHP e MySQL (ex: XAMPP, WAMP, LAMP).
- Navegador moderno para visualização.


---

## Observações finais

- Todo o código está comentado detalhadamente (PHP, JS, CSS e HTML) para facilitar a avaliação académica, conforme solicitado no enunciado do projeto.
- O projeto segue as melhores práticas de responsividade, acessibilidade e organização de ficheiros.
- Qualquer dúvida ou sugestão, contactar o autor.
