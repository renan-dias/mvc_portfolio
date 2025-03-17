# MVC Portfolio

Este projeto é parte da aula de desenvolvimento back-end, onde os alunos irão aplicar a lógica de construção da comunicação com banco de dados em PHP utilizando PDO, mas agora na estrutura do MVC (Model-View-Controller).

## Descrição do Projeto

O projeto consiste em um portfólio de desenvolvimento web gerenciável, com conexões a APIs externas. Ele permite que os usuários gerenciem seus projetos e exibições de portfólio de forma dinâmica.

## Estrutura do Projeto

```
├── assets/
│   ├── css/
│   │   └── estilo.css
│   ├── js/
│   │   └── script.js
│   ├── uploads/
├── controllers/
│   ├── PortfolioController.php
│   ├── AdminController.php
│   ├── DashboardController.php
├── models/
│   ├── Portfolio.php
│   ├── Visitantes.php
│   ├── Vagas.php
├── views/
│   ├── portfolio/
│   │   ├── index.php
│   │   ├── admin.php
│   │   ├── dashboard.php
├── config/
│   └── banco.php
├── index.php
```

### Diretórios e Arquivos

- **assets/**: Contém arquivos estáticos como CSS, JavaScript e uploads.
    - **css/**: Arquivos de estilo.
    - **js/**: Scripts JavaScript.
    - **uploads/**: Diretório para uploads de arquivos.
- **controllers/**: Contém os controladores que gerenciam a lógica do aplicativo.
    - **PortfolioController.php**: Controlador principal do portfólio.
    - **AdminController.php**: Controlador para administração.
    - **DashboardController.php**: Controlador do painel de controle.
- **models/**: Contém os modelos que representam os dados do aplicativo.
    - **Portfolio.php**: Modelo do portfólio.
    - **Visitantes.php**: Modelo de visitantes.
    - **Vagas.php**: Modelo de vagas.
- **views/**: Contém as visualizações que são exibidas aos usuários.
    - **portfolio/**: Diretório de visualizações do portfólio.
        - **index.php**: Página inicial do portfólio.
        - **admin.php**: Página de administração.
        - **dashboard.php**: Página do painel de controle.
- **config/**: Contém arquivos de configuração.
    - **banco.php**: Configuração do banco de dados.
- **index.php**: Arquivo principal que inicia o aplicativo.

## Tecnologias Utilizadas

- PHP
- PDO (PHP Data Objects)
- Estrutura MVC

## Como Executar o Projeto

1. Clone o repositório para o seu ambiente local.
2. Configure o banco de dados no arquivo `config/banco.php`.
3. Execute o servidor PHP embutido ou configure um servidor web como Apache ou Nginx.
4. Acesse o projeto através do navegador.

## Contribuição

Sinta-se à vontade para contribuir com o projeto. Faça um fork do repositório, crie uma branch para suas alterações e envie um pull request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
