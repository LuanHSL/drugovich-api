# Drugovich API
Este é um projeto de API RESTful desenvolvido em PHP utilizando o framework Laravel. A API é responsável por manipular os dados de Grupos e Clientes

## Arquitetura

> Requisitos mínimos
- [PHP ^7.4.10](https://www.php.net)
- [Mysql 8](https://www.mysql.com)
- [Composer](https://getcomposer.org)

## Instalação

- Clone o repositório em seu computador:
```sh
git clone https://github.com/LuanHSL/drugovich-api.git
```

- Acesse a pasta do projeto:
```sh
cd drugovich-api
```

- Instale as dependências do projeto com o Composer:
```sh
composer install
```

- Duplique o arquivo **.env.example** e renomeie a cópia para **.env**:
- Alterar os dados de banco no arquivo .env para os referente ao seu banco local
- Popule seu banco de dados com as migrações e seeds:
```sh
php artisan migrate --seed
```

- Suba o servidor:
```sh
php artisan serve
```

## Dados técnicos

> Logins do Gerente
- Login no sistema (gerente nivel 1):
  - E-mail: **gerente.level1@hotmail.com**
  - Senha: **password**

- Login no sistema (gerente nivel 2):
  - E-mail: **gerente.level2@hotmail.com**
  - Senha: **password**

> Lista de requisições

- Autenticação do gerente:
  - Método: **POST**
  - URL: **http://localhost:8000/authenticate**
  - Request body (JSON):
  ```sh
  {
    "email": "gerente.level1@hotmail.com",
    "password": "password"
  }
  ```

- Cadastro de cliente:
  - Método: **POST**
  - URL: **http://localhost:8000/customer**
  - Request body (JSON):
  ```sh
  {
    "cnpj": "31.184.242.825/45",
    "name": "Marcos Henrique",
    "foundation_date": "2023-10-10 00:00:00",
    "group_id": 1
  }
  ```

- Exclusão de cliente:
  - Método: **POST**
  - URL: **http://localhost:8000/customer/{ID}**
  - Onde {ID} é o ID do cliente que deseja excluir.

- Listagem de grupos:
  - Método: **GET**
  - URL: **http://localhost:8000/group**

- Cadastro de grupo:
  - Método: **POST**
  - URL: **http://localhost:8000/group**
  - Request body (JSON):
  ```sh
  {
    "name": "Grupo A"
  }
  ```

- Atualização  de grupo:
  Método: **PUT**
  URL: **http://localhost:8000/group**
  Request body (JSON):
  ```sh
  {
    "id": 1,
    "name": "Grupo A"
  }
  ```

- Exclusão de grupo:
  - Método: **DELETE**
  - URL: **http://localhost:8000/group/{ID}**
  - Onde {ID} é o ID do grupo que deseja excluir.
