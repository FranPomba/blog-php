# Blog em PHP Nativo

Este projeto é um blog simples desenvolvido em PHP nativo com o objetivo de praticar boas práticas de desenvolvimento e consolidar conceitos fundamentais.

## Funcionalidades

- CRUD de posts (Criar, Ler, Atualizar, Excluir);
- Listagem de posts com paginação;
- Exibição de detalhes de um post;
- Sistema de autenticação para gerenciar os posts;
- Interface construída com templates Twig;
- Sistema de roteamento utilizando SimpleRouter;
- Banco de dados MySQL para armazenar os dados.

## Tecnologias Utilizadas

- **PHP 8+**: Linguagem principal;
- **MySQL**: Banco de dados relacional;
- **SimpleRouter**: Biblioteca de roteamento;
- **Twig**: Motor de templates;
- **Composer**: Gerenciador de dependências;

## Requisitos

- PHP 8 ou superior;
- Composer instalado;
- Servidor MySQL;
- Servidor web como Apache ou Nginx.

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/blog-php.git
   cd blog-php
   ```

2. Instale as dependências via Composer:
   ```bash
   composer install
   ```



3. Inicie o servidor de desenvolvimento:
   ```bash
   php -S localhost:8000 -t public/
   ```

