<h1 align="center">Blog TECHCOD v2.30.3 </h1>
<h2>Descrição do Projeto</h2>
<p align="justify">Basicamente é um blog simples com controle de privilégio pra usuario PHP</p>
<!-- foto do projeto  --->
<img src="https://raw.githubusercontent.com/lgfranco22/blog/main/imagens/projeto.png"/>

### Tabela de Conteúdos
  * [Principais tecnologias usadas](#principais-tecnologias-usadas)
  * [Principais funcionalidades](#principais-funcionalidades)
  * [Como executar](#como-executar)
  * [Segurança aplicada](#segurança-aplicada)

### Principais tecnologias usadas
<img src="https://img.shields.io/static/v1?label=PHP&message=language&color=blue&style=for-the-badge"/>

<img src="https://img.shields.io/static/v1?label=JAVASCRIPT&message=language&color=yellow&style=for-the-badge&logo=JS"/>

<img src="https://img.shields.io/static/v1?label=HTML5&message=markup_language&color=red&style=for-the-badge&logo=html"/>

<img src="https://img.shields.io/static/v1?label=CSS3&message=style_sheet&color=cian&style=for-the-badge&logo=CSS"/>

### Principais funcionalidades
- Verificação de login com AJAX
- Verificação e cadastro de usuario com AJAX e autenticação automatica na conta
- Autenticação e controle de usuario administrador do sistema

> Status do Projeto: Concluido :heavy_check_mark:

### Segurança aplicada
- Proteção contra HTML Injection
- Proteção contra SQL Injection
- Proteção contra XSS Storage e Reflected
- Senha armazenada no banco de dados com password_hash

### Como executar
- No terminal navegue até o diretório onde ficam seus projetos dentro do seu apache e clone o projeto do GitHub
```shell
git clone git@github.com:lgfranco22/blog.git
```
- Entre na pasta do projeto
```shell
cd blog
```
<p>OBS: Caso tenha feito o download do repositório pelo zip, renomeie a pasta descompactada para <b>blog</b></p>

- Acesse o seu Administrador de banco de dados
  - Por exemplo, o phpmyadmin.
  - No seu navegador digite:
    ```shell
      localhost/phpmyadmin
    ```
- Faça a importação do banco de dados do arquivo <p>/blog/projeto_comentarios.sql</p> no seu banco de dados local.

- Modifique os valores das credenciais nos arquivos pertinentes
    ```shell
      cadastro.php
      discussao.php
      index.php
      login.php
    ```

- Para executar a aplicação corretamente, depois de importado o arquivo de banco de dados as credenciais precisam ser alteradas.
   ```shell
       A configuração padrão é
       db = "projeto_comentarios"
       host = "localhost"
       user = "root"
       senha = ""
       OBS.: Ja deixei um usuario administrador cadastrado no arquivo sql.
       Email admin@email.com
       Senha admin
    ```
