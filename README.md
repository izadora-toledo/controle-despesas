
<h3>REQUISITOS PARA RODAR A API</h3>
<h4>Instalação do XAMPP</h4>
Para instalar o XAMPP, siga os seguintes passos:

* Acesse o site oficial do XAMPP (https://www.apachefriends.org/index.html) e faça o download da versão mais recente do XAMPP para o seu sistema operacional.
* Abra o arquivo de instalação e siga as instruções do assistente de instalação. (Não troque o caminho onde ele vai instalar o xampp, deixe exatamente como está).
* Selecione a opção de instalação do PHP durante a instalação.

Pronto, Xampp e PHP instalados com sucesso.
<h3>RODANDO A API</h3>

<h4>Executando o Xampp</h4>

* Vá na pasta onde o xampp foi instalado: C:\xampp e procure pelo arquivo xampp-control e clique nele pra abrir.
* Ele vai abrir um menu de controle e você vai clicar em start no Apache e no MySQL.

- Abra o prompt de comando e execute o seguinte comando: cd C:\xampp\htdocs
- Depois execute(é pra abrir o projeto no vscode): code .
- Abra o terminal dentro do vscode
- Clone o projeto utilizado o comando git clone https://github.com/izadora-toledo/controle-despesas.git
  Depois execute: cd controle-despesas
- Instale as dependencias utilizando o comando: composer install
- Crie uma cópia do arquivo .env.example com o nome de .env
- Gere a chave de criptografia utilizando o comando: php artisan key:generate
- Dentro do arquivo .env preencha os campos abaixo com os mesmos valores:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

- Utilize o comando: php artisan migrate para criar as tabelas do banco de dados
- Utilize o comando: php artisan db:seed para popular as tabelas com alguns dados
- Utilize o comando: php artisan serve, isso irá executará o projeto na porta 8000

<p>Os testes do projeto foram feitos com o framework PHPUnit, para realizar os testes basta utilizar o comando php artisan test</p>

<p>Inclua os dados abaixo no final do arquivo .env abaixo da linha JWT SECRET</p>

- JWT_PUBLIC_KEY=C:/xampp/htdocs/laravel-api/api/storage/keys/public.pem
- JWT_PRIVATE_KEY=C:/xampp/htdocs/laravel-api/api/storage/keys/private.pem

<p>Pra testar a aplicação no frontend utilize o email e senha abaixo:</p>
<p>EMAIL: admin@gmail.com</p>
<p>SENHA: 12345678</p>

<p>Infelizmente não consegui fazer da forma que eu gostaria, faltou algumas coisas.</p>
Algumas validações:

- O usuário logado só pode editar o próprio usuário dele.
- O usuário logado só pode editar e excluir a própria despesa.
- A despesa que for criada já vem vinculada ao usuário que está logado.

Muitas validações ficaram sem mensagens de erro e etc. Pra mim é novo mexer com vuejs então eu demorei um tempo a digerir como funciona realmente e ainda sigo tentando entender algumas coisas. De toda forma irei refatorar o projeto pra ficar 100% haha.

Foram usados PHP, Laravel, VueJS3 com Quasar. Usei PHPUnit para os testes e JWT pra autenticação. Não tive tempo de implementar os disparos dos e-mails.
