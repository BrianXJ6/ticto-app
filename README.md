# Instalação

Para fazer o download do projeto siga os passos abaixo:

Primeiramente faça o clone do repositório com o exemplo de código abaixo:

```sheel
git clone https://github.com/BrianXJ6/ticto-app.git
```

Depois na raiz do projeto realize uma cópia do arquivo `.env.example` para `.env`

```sheel
cp .env.example .env
```

Agora precisamos baixar todas as dependências do Composer

```sheel
composer update
```

Com todas os pacotes prontos, agora temos acesso ao `Artisan Command` e vamos gerar uma nova chave para nossa aplicação com o comando abaixo:

```sheel
php artisan key:generate
```

Podemos adiantar e já baixar os pacotes do NPM

```sheel
npm i
```

> Obs: Para desenvolvimento, após a instalação dos pacotes, vc pode rodar o comando `run dev`, caso deseje gearar uma build para produção use o `run build`

```sheel
npm run dev
npm run build
```

Agora que já preparamos tudo para iniciar o projeto, vamos levantar todos os serviços necessário, para isso vamos utilizar o `Laravel Sail` que facilita a criação desse ambiente de desenvolvimento em containers usando o Docker, e para facilitar vamos criar um `alias` para facilitar a chamada ao sail, então na raiz do projeto execute o seguinte código:

```sheel
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

> Agora apenas com o comando `sail` já é possível ter acesso aos comandos e caso deseje utilizar o sail sem o alias execute: `./vendor/bin/sail`

Então sem mais delongas, vamos subir todos os serviços com o camndo abaixo (utilizando o alias)<br>
Esse comando vai disponibilizar 2 ambientes:

- Serviço da aplicação com PHP `8.3`;
- Serviço do MySQL na versão mais recente `latest`;

```sheel
sail up -d
```

Após levantar todos os serviços sua aplicação já deve está funcionando em `http://localhost`<br>
Caso deseje fazer customizações, explore o arquivo de ambiente `.env` e modifique-o como quiser.

E por fim, vamos preparar nossa base de dados para que o sistema torne-se funcional<br>
então execute

```sheel
sail a migrate
```
