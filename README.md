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
6.  Pressione Enter e aguarde a conclusão de todos os passos.

```powershell
# --- INÍCIO DO SCRIPT DE INSTALAÇÃO AUTOMATIZADA ---

# 1. Clona o repositório na pasta atual que está aberta no VS Code
Write-Host "Clonando o repositório..." -ForegroundColor Yellow;
git clone https://github.com/FaeddaGabriel/Grupo-DS.git .;

# 2. Define o caminho para a pasta de código-fonte
$sourceDir = "src";

# 3. Instala as dependências do Node.js (na raiz ) e do Composer (na pasta src)
Write-Host "Instalando dependências (NPM e Composer)..." -ForegroundColor Green;
npm install;
composer install --working-dir=$sourceDir;

# 4. Configura o ambiente Laravel
Write-Host "Configurando o ambiente Laravel..." -ForegroundColor Green;
cp "$sourceDir\.env.example" "$sourceDir\.env";
php "$sourceDir\artisan" key:generate;
php "$sourceDir\artisan" storage:link;

# 5. Executa as migrações e seeders do banco de dados
Write-Host "Configurando o banco de dados..." -ForegroundColor Green;
php "$sourceDir\artisan" migrate --force --seed;

# 6. Inicia o servidor Laravel em uma nova janela
Write-Host "Iniciando o servidor..." -ForegroundColor Green;
Start-Process powershell -ArgumentList "php $sourceDir\artisan serve";

# 7. Abre o projeto no navegador após uma pequena pausa
Write-Host "Abrindo o projeto no navegador..." -ForegroundColor Green;
Start-Sleep -Seconds 5;
Start-Process "http://127.0.0.1:8000";

Write-Host "Instalação concluída com sucesso!" -ForegroundColor Cyan;

# --- FIM DO SCRIPT DE INSTALAÇÃO AUTOMATIZADA ---
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
