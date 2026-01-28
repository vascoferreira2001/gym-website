
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
- Marcação de aulas (Personal Trainer, Nutrição, Aulas de Grupo, Musculação) via formulário
- Validação de todos os campos dos formulários em tempo real (JS)
- Feedback visual de erros e sucesso nos formulários

### Autenticação e perfis de utilizador
- Login por email ou identificador único
- Logout seguro (destruição de sessão)
- Redirecionamento automático para a área reservada correta consoante o perfil
- Perfis suportados: administrador, gestor de clientes, professor, personal trainer, sócio, cliente

### Área reservada do administrador (admin)
- Dashboard com resumo e navegação rápida
- Listagem dinâmica de aulas, marcações e contactos
- Inserção de novas aulas (formulário com validação)
- Edição de aulas existentes
- Remoção de aulas, marcações e contactos (com confirmação)
- Visualização de todos os contactos recebidos
- Gestão de utilizadores (dependendo do perfil)

### Área reservada do professor/personal trainer
- Criação/marcação de novas aulas (com data, hora, sala)
- Listagem de todas as aulas criadas
- Visualização do número de inscritos em cada aula
- Consulta dos dados dos sócios inscritos em cada aula
- Criação de contas de sócio (com geração automática de identificador)

### Área reservada do sócio/cliente
- Visualização de aulas disponíveis para inscrição (a implementar)
- Inscrição em aulas (máximo de 20 inscrições por aula, a implementar)
- Consulta das suas próprias marcações (a implementar)

### Funcionalidades técnicas e extras
- Validação de todos os formulários em JavaScript (contacto, booking, inserção de aulas, etc)
- Layout totalmente responsivo (mobile, tablet, desktop)
- Utilização de Bootstrap 5 via CDN para performance
- Código comentado em pt-PT em todos os ficheiros (PHP, JS, CSS)
- Estrutura modular e organizada (includes, admin, área reservada, assets)
- Scripts SQL para criação e povoamento da base de dados
- Possibilidade de expansão para novas funcionalidades (ex: upload de imagens, notificações, pagamentos, etc)

### Fluxos de navegação possíveis
- Visitante → Explora o site → Marca aula/contacta → (opcional) regista-se/entra
- Admin → Login → Gestão total de aulas, marcações, contactos e utilizadores
- Professor → Login → Cria aulas, consulta inscrições, cria sócios
- Sócio → Login → Consulta aulas disponíveis, inscreve-se, consulta marcações

### Segurança e boas práticas
- Proteção de páginas reservadas por sessão PHP
- Validação de dados no frontend (JS) e backend (PHP)
- Passwords encriptadas na base de dados
- Redirecionamento seguro após login/logout

---



## O que faz cada página

### index.php (Homepage)
Página inicial do site. Apresenta um carousel com 4 imagens de destaque, cards de serviços com botão expand/collapse para mais informações, e links rápidos para marcação de aulas. É o ponto de entrada e mostra o que o ginásio oferece.

### about.php (Sobre Nós)
Página institucional com a história, missão e valores do Maia GYM. Inclui texto descritivo e imagens ilustrativas, além de um botão para contactar o ginásio.

### gallery.php (Galeria)
Mostra uma galeria de imagens reais do ginásio, organizada em cards responsivos. Permite aos visitantes conhecerem o espaço e as atividades.

### booking.php (Marcação de Aulas)
Formulário para marcação de aulas (Personal Trainer, Nutrição, Aulas de Grupo, Musculação). Os dados são validados em JS e enviados para a base de dados. Apenas utilizadores autenticados podem aceder.

### contact.php (Contacte-nos)
Formulário de contacto para envio de mensagens ao ginásio. Inclui validação de campos e feedback ao utilizador.

### login.php / logout.php
Permitem a autenticação de utilizadores (admin, professores, sócios, etc). O login direciona para a área reservada conforme o perfil do utilizador.

### admin/
**index.php**: Dashboard do administrador, com acesso rápido às principais funcionalidades de gestão.
**list.php**: Listagem de aulas, marcações e contactos, com opções de editar e remover.
**insert.php**: Formulário para inserir novas aulas (classes) na base de dados.
**edit.php**: Permite editar os dados de uma aula existente.
**delete.php**: Confirmação e remoção de aulas, marcações ou contactos.

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

```text
gym-website/
│
├── index.php          # Homepage (carousel, cards de serviços)
├── about.php          # Página "Sobre Nós"
├── gallery.php        # Galeria de imagens responsiva
├── booking.php        # Formulário de marcação de aulas
├── contact.php        # Formulário de contacto
│
├── login.php, logout.php   # Autenticação de utilizadores
│
├── admin/
│   ├── index.php      # Dashboard do administrador
│   ├── list.php       # Listagem dinâmica (classes, bookings, contacts)
│   ├── insert.php     # Inserir nova aula (classes)
│   ├── edit.php       # Editar aula (classes)
│   ├── delete.php     # Apagar aulas/bookings/contacts
│
├── area-reservada/    # Páginas reservadas a professores/sócios
│
├── includes/
│   ├── header.php     # Header global (menu, Bootstrap, início do HTML)
│   ├── footer.php     # Footer global (scripts JS, fecho do HTML)
│   ├── db.php         # Ligação à base de dados MySQL
│
├── assets/
│   ├── css/
│   │   └── style.css  # Estilos personalizados (tema, responsividade)
│   ├── js/
│   │   └── script.js  # JS único do projeto (validações, interações)
│   ├── images/        # Imagens do ginásio e galeria
│
└── sql/
    ├── maia_gym_full.sql      # Criação das tabelas e dados de exemplo
```


## Organização do JavaScript e CSS

- **assets/js/script.js**: ficheiro único JS, com comentários detalhados. Inclui:
    - Validação de formulários (contacto, booking)
    - Inicialização de carousels (caso existam)
    - Pode ser expandido para outras interações globais
- **assets/css/style.css**: todos os estilos customizados, organizados por secção (navbar, hero, cards, etc), com comentários.

## Como correr o projeto localmente


1. Clone ou copie o projeto para a sua máquina local.
2. Coloque as imagens e recursos na pasta `assets`.
3. Importe o ficheiro `sql/maia_gym_full.sql` para criar as tabelas e dados de exemplo no MySQL.
4. Edite o ficheiro `includes/db.php` com os dados da sua base de dados local.
5. Abra o projeto num servidor local (XAMPP, WAMP, LAMP, MAMP, etc).
6. Aceda a `http://localhost/gym-website` no browser.
7. Faça login como admin para aceder à área reservada.



## Credenciais de Teste

- **Admin:**
    - Email: `admin@gym.com`
    - Password: `admin123`


## Requisitos

- PHP 8+ instalado para páginas dinâmicas.
- Servidor web com suporte a PHP e MySQL (ex: XAMPP, WAMP, LAMP).
- Navegador moderno para visualização.


---


---

## Observações finais

- Todo o código está comentado detalhadamente (PHP, JS, CSS e HTML) para facilitar a avaliação académica, conforme solicitado no enunciado do projeto.
- O projeto segue as melhores práticas de responsividade, acessibilidade e organização de ficheiros.
- Qualquer dúvida ou sugestão, contactar o autor.
