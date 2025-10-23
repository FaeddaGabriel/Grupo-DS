# SportsKing E-commerce

Projeto acadêmico de um sistema de e-commerce para a venda de roupas, acessórios e artigos esportivos, desenvolvido com PHP e o framework Laravel.

**Funcionalidades Implementadas:**
*   Cadastro e Login de usuários com controle de nível de acesso (Admin/Cliente).
*   Página de Contato com envio de mensagens.
*   Dashboard administrativa para visualização de dados.
*   Página de consulta de usuários e contatos registrados.
*   Perfil de usuário com funcionalidade de upload de foto de perfil.

---

## 🚀 Guia de Instalação Rápida (Ambiente Windows com XAMPP)

Este guia foi projetado para configurar o projeto em uma nova máquina de forma rápida e automatizada.

### 1. Pré-requisitos

Antes de começar, garanta que os seguintes programas estão instalados na máquina:
*   **Git:** [Link para download do Git](https://git-scm.com/downloads )
*   **XAMPP:** Essencial para o banco de dados e servidor web.
*   **Composer:** [Link para download do Composer](https://getcomposer.org/download/ )
*   **Node.js e NPM:** Necessário para as ferramentas de formatação de código. [Link para download do Node.js](https://nodejs.org/en/ )
*   **VS Code:** [Link para download do VS Code](https://code.visualstudio.com/ )

### 2. Configuração Inicial do Git (Apenas na Primeira Vez)

Se é a primeira vez que você usa o Git nesta máquina, configure sua identidade:
```bash
git config --global user.name "Seu Nome Completo"
git config --global user.email "seu-email@exemplo.com"
```

### 3. Script de Instalação Automatizada (Copiar e Colar)

O script abaixo fará todo o trabalho pesado: clonar o projeto, instalar dependências, configurar o ambiente e iniciar o servidor.

**Instruções Passo a Passo:**
1.  Abra o **XAMPP Control Panel** e inicie os módulos **Apache** e **MySQL**.
2.  Abra o **VS Code**.
3.  Vá em `File > Open Folder...` e escolha (ou crie) uma **pasta vazia** para o projeto.
4.  Dentro do VS Code, abra o terminal integrado com o atalho **`Ctrl + '`** (Control + Aspas Simples).
5.  **Copie o bloco de código inteiro abaixo e cole no terminal.**
6.  Pressione Enter e aguarde a conclusão dos comandos.

```powershell
git clone https://github.com/FaeddaGabriel/Grupo-DS.git .;
$sourceDir = "src";
npm install;
composer install --working-dir=$sourceDir;
cp "$sourceDir\.env.example" "$sourceDir\.env";
php "$sourceDir\artisan" key:generate;
php "$sourceDir\artisan" storage:link;
php "$sourceDir\artisan" migrate --force --seed;
Start-Process powershell -ArgumentList "php $sourceDir\artisan serve";
Start-Sleep -Seconds 5;
Start-Process "http://127.0.0.1:8000";
```

---

## 🛠️ Testando a API com o Postman

### Testando o Upload de Foto de Perfil

**1. Gerar um Token de Acesso**
```bash
# Execute este comando na raiz do projeto (dentro do terminal do VS Code)
php src/artisan tinker
```
Dentro do Tinker:
```php
$user = App\Models\User::find(1);
echo $user->createToken('PostmanToken')->plainTextToken;
```

**2. Configurar a Requisição no Postman**
*   **Método:** `POST`
*   **URL:** `http://127.0.0.1:8000/api/perfil/foto`
*   **Headers:** `Accept: application/json`, `Authorization: Bearer SEU_TOKEN_AQUI`
*   **Body:** `form-data`, chave `foto` do tipo `File`.

---

## 🧭 Guia de Comandos Git

### 🔹 **Base**

* **`git init`** – Cria um novo repositório Git na pasta atual.
* **`git clone [URL]`** – Clona um repositório do GitHub para o computador.
* **`git status`** – Mostra o estado atual dos arquivos (modificados, pendentes ou deletados).
* **`git add [arquivo]`** – Adiciona arquivos e prepara para o commit.

  > Dica: para adicionar todos os arquivos modificados, use `git add .`
* **`git commit -m "Mensagem"`** – Salva as alterações no histórico com uma mensagem curta.
* **`git log`** – Exibe o histórico de commits.
* **`git diff`** – Mostra as diferenças entre versões dos arquivos.

---

### 🌿 **Branches**

* **`git branch`** – Lista todas as branches.
* **`git branch [nome]`** – Cria uma nova branch.
* **`git checkout [nome]`** – Troca para outra branch.
* **`git switch [nome]`** – (Alternativa moderna ao checkout) muda de branch.
* **`git merge [branch]`** – Junta as alterações de outra branch na atual.
* **`git fetch`** – Busca atualizações do repositório remoto sem aplicá-las.
* **`git pull`** – Puxa e aplica as atualizações do repositório remoto.
* **`git push`** – Envia commits locais para o repositório remoto.

---

### 🌐 **Repositórios Remotos**

* **`git remote -v`** – Lista os repositórios remotos conectados.
* **`git remote add origin [URL]`** – Conecta o repositório local a um remoto.
* **`git remote remove [nome]`** – Remove a conexão com um repositório remoto.
* **`git remote set-url origin [URL]`** – Altera o endereço do repositório remoto.

---

### 📂 **Controle de Arquivos**

* **`git rm [arquivo]`** – Remove um arquivo do repositório e marca para exclusão.
* **`git mv [arquivo1] [arquivo2]`** – Renomeia ou move um arquivo, registrando a mudança.

---

### 🧩 **Reversão e Correção**

* **`git reset [arquivo]`** – Desfaz o `git add` em um arquivo.
* **`git reset --hard`** – Reverte tudo para o último commit, apagando alterações.
* **`git revert [commit]`** – Cria um novo commit que desfaz outro commit anterior.
* **`git checkout [arquivo]`** – Descarta alterações em um arquivo específico.

---

### 📜 **Histórico e Inspeção**

* **`git show [commit]`** – Exibe detalhes de um commit específico.
* **`git log --oneline`** – Mostra o histórico de commits de forma resumida.
* **`git blame [arquivo]`** – Mostra quem modificou cada linha de um arquivo.

---

### ⚙️ **Comandos Avançados de Branch**

* **`git branch -d [branch]`** – Deleta uma branch local.
* **`git push origin --delete [branch]`** – Deleta uma branch no repositório remoto.
* **`git stash`** – Guarda temporariamente alterações não commitadas.
* **`git stash pop`** – Recupera as alterações guardadas com `git stash`.


