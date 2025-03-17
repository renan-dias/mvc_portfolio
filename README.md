# Tutorial: Criando um CRUD para uma Página de Portfólio com MVC

## Introdução
Este tutorial irá guiá-lo na criação de um sistema de CRUD (Create, Read, Update, Delete) para uma página de portfólio de um desenvolvedor utilizando o padrão de arquitetura MVC (Model-View-Controller). O projeto será desenvolvido com PHP, HTML, CSS e JavaScript, utilizando o framework Bootstrap para estilização e responsividade. Além disso, o site terá animações com keyframes CSS e será modularizado com componentes como header, footer, etc.

## Estrutura do Projeto
A estrutura do projeto será organizada da seguinte forma:
```
/portfolio-linkedin/
│
├── /app/
│   ├── /controllers/     → Lógica das páginas
│   ├── /models/          → Conexão com BD e regras
│   └── /views/           → HTML + CSS (bootstrap, js)
│       ├── /partials/    → header.php, footer.php, etc
│       └── /pages/       → páginas principais
│
├── /public/              → index.php (router), css, js, imagens
│
├── /config/              → config.php (conexão BD, constantes)
│
└── /sql/                 → Script do banco de dados
```

## Banco de Dados
Crie um banco de dados MySQL com o seguinte script SQL:
```sql
CREATE DATABASE portfolio_db;

USE portfolio_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    url VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Configuração do Projeto
1. **Configuração do Autoload**: Configure o autoload para carregar automaticamente as classes do projeto.
2. **Configuração do Banco de Dados**: Configure a conexão com o banco de dados no arquivo `config/database.php`.

## Desenvolvimento do Projeto
### 1. Modelos (Models)
Crie os modelos para `User`, `Portfolio` e `Vaga` em `/models`.

### 2. Controladores (Controllers)
Crie os controladores para gerenciar as ações dos usuários, portfólios e vagas em `/controllers`.

### 3. Visões (Views)
Crie as visões para exibir as páginas do site em `/views`.

### 4. Roteamento
Configure o roteamento no arquivo `index.php` para direcionar as requisições para os controladores corretos.

### 5. Dashboard e Área de Administração
Crie uma dashboard para gerenciar os portfólios e visualizar os visitantes.

### 6. Animações e Estilização
Utilize Bootstrap para estilização e adicione animações com keyframes CSS.

### 7. Responsividade
Garanta que o site seja responsivo utilizando as classes do Bootstrap.

## Exemplo de Código
### Modelo de Usuário (`models/User.php`)
```php
<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($nome, $email, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senhaHash);
        return $stmt->execute();
    }

    public function login($email, $senha) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            return $user;
        }
        return false;
    }
}
?>
```

### Controlador de Portfólio (`controllers/PortfolioController.php`)
```php
<?php
class PortfolioController {
    private $portfolioModel;

    public function __construct($portfolioModel) {
        $this->portfolioModel = $portfolioModel;
    }

    public function create($userId, $titulo, $descricao, $url) {
        return $this->portfolioModel->create($userId, $titulo, $descricao, $url);
    }

    public function read($userId) {
        return $this->portfolioModel->read($userId);
    }

    public function update($id, $titulo, $descricao, $url) {
        return $this->portfolioModel->update($id, $titulo, $descricao, $url);
    }

    public function delete($id) {
        return $this->portfolioModel->delete($id);
    }
}
?>
```

### Visão de Portfólio (`views/portfolio.php`)
```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <!-- Header content -->
    </header>
    <main>
        <div class="container">
            <h1>Portfólio</h1>
            <!-- Portfolio content -->
        </div>
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
```

### Animações com Keyframes CSS (`assets/css/styles.css`)
```css
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 2s ease-in-out;
}
```

## Conclusão
Este tutorial forneceu uma visão geral de como criar um sistema de CRUD para uma página de portfólio utilizando o padrão MVC com PHP, HTML, CSS e JavaScript. O projeto inclui uma área de administração, dashboard, animações e responsividade. Sinta-se à vontade para expandir e personalizar o projeto conforme necessário.
