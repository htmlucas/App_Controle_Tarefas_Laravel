# Controle de Tarefas


## Sobre

Controle de Tarefas, é um sistema desenvolvido em Laravel Utilizando Laravel UI junto com Bootstrap. Sistema totalmente acadêmico, afim de aprimorar e relembrar lógica e alguns conhecimentos a funcionamento.

## Instalação

- Acesse o repositório do projeto a ser clonado, clique no botão verde “code” e
copie o link do repositório clicando no botão destacado

![image](https://user-images.githubusercontent.com/25908504/155614634-fc4c5a73-ae0f-4cfb-beac-a3baf56e95cc.png)


- Acesse a pasta onde deseja clonar o projeto no seu computador (para quem
usa o XAMPP, pode ser na pasta htdocs), abra um terminal e digite e execute o
comando:
    ### git clone <LINK DO REPOSITÓRIO> 

- Quando subimos um projeto para o repositório remoto, algumas pastas e
arquivos não são enviados, normalmente por serem muito grandes.
É o caso da pasta vendor, que contém as dependências do Laravel e do
projeto. (o arquivo que configura o que não vai ser enviado para o repositório é o
.gitignore, encontrado na raiz do projeto).
- Para que o projeto funcione, precisamos gerar essa pasta vendor, para isso,
entre na pasta do projeto clonado com o comando: 
    ### cd < NOME DA PASTA DO PROJETO CLONADO >
- e depois disso digite e execute o comando 
    ### composer install:
- Após executar o comando composer install, você verá no terminal que serão
instaladas diversas dependências (esse processo pode demorar um pouco).

- Esse comando vai ler o arquivo composer.lock (onde estão descritas as
dependências necessárias e suas respectivas versões) e gerar a pasta vendor com
todas as dependências.

- Você pode perceber que também está faltando o arquivo .env no projeto
clonado, e isso acontece pois este arquivo também está configurado para ser
ignorado nos commits, e normalmente não estará presente nos repositórios, pois
contém dados sensíveis, como as credenciais do banco de dados, servidor de email
e outros.

- Para resolver isso, entra na pasta do projeto (pode ser com o explorador de
arquivos mesmo), procure um arquivo chamado env.example. Este arquivo contém
um template do arquivo .env

- Para resolver isso, entra na pasta do projeto (pode ser com o explorador de
arquivos mesmo), procure um arquivo chamado env.example. Este arquivo contém
um template do arquivo .env

- Agora, abra o terminal novamente na pasta do projeto clonado e execute o
comando php artisan key:generate para gerar uma chave que será inserida
automaticamente no arquivo .env (esse passo é essencial para o funcionamento do
sistema).

![image](https://user-images.githubusercontent.com/25908504/155615603-f1a0205a-1ba9-4889-9153-0ac013457b6c.png)

- Pronto! O projeto clonado já está pronto para ser executado. Lembre-se que
talvez seja necessário executar o comando php artisan migrate para gerar as
tabelas no banco de dados e depois o comando php artisan serve para executar o
projeto

## Projeto

- Tela inicial para pessoas autenticadas (ou não).

![image](https://user-images.githubusercontent.com/25908504/155616324-e96b9828-0ac0-4090-a4d8-ea245d710aea.png)

![image](https://user-images.githubusercontent.com/25908504/155616367-8ce4321b-3a66-44b4-89e3-34a4f253c598.png)

- Registro com verificação por EMAIL

![image](https://user-images.githubusercontent.com/25908504/155616708-b51cacd8-5724-487b-84a1-4ecfe223e0fd.png)

![image](https://user-images.githubusercontent.com/25908504/155616797-80e3fac2-8ed4-4b3d-9c5d-c1303ace380f.png)

- Tela de Login com recuperação de senha por EMAIL

![image](https://user-images.githubusercontent.com/25908504/155617089-e7851ded-5b4c-4388-b6a8-03ac5f5cf8ad.png)

![image](https://user-images.githubusercontent.com/25908504/155617933-8eee7b7f-7a23-442b-8618-5cd00c12cb48.png)

![image](https://user-images.githubusercontent.com/25908504/155617959-5bd5d123-f7eb-4abd-aa1d-83abc5ed73e7.png)


- Tela Inicial de Tarefas vinculadas a pessoa (ID), com Exportação em CSV,XLSX,PDF

![image](https://user-images.githubusercontent.com/25908504/155616875-2ff1275a-3864-4444-96f3-f5ae66d5f65e.png)

- Criação de Tarefa com visualização de erros do formulário

![image](https://user-images.githubusercontent.com/25908504/155617310-7cf1f1ee-fe2c-4273-8fde-081beaf15b09.png)

- Envio de EMAIL ao realizar uma nova adição de Tarefa

![image](https://user-images.githubusercontent.com/25908504/155618034-ea1530c3-e6e0-41b2-a4e0-2e7e693da79a.png)

![image](https://user-images.githubusercontent.com/25908504/155618055-834258a2-9d4d-4df3-b1f5-7bbf1b7dba1c.png)


- Edição e Exclusão da Tarefa

![image](https://user-images.githubusercontent.com/25908504/155617546-753df6ac-6f78-4a1c-905d-fdfe5d29ec03.png)


- Exportar usando PDF

![image](https://user-images.githubusercontent.com/25908504/155617690-9b132eec-fb57-4a5f-87a9-881cf049dea8.png)


