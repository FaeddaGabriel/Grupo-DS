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

Este guia foi projetado para configurar o projeto em uma nova máquina de forma rápida e totalmente automatizada.

### 1. Pré-requisitos (O que precisa estar instalado)

Antes de começar, garanta que os seguintes programas estão instalados na máquina:
*   **Git:** [Link para download do Git](https://git-scm.com/downloads )
*   **XAMPP:** Com os módulos **Apache** e **MySQL** iniciados.
*   **Composer:** [Link para download do Composer](https://getcomposer.org/download/ )
*   **Node.js e NPM:** Necessário para as ferramentas de formatação de código. [Link para download do Node.js](https://nodejs.org/en/ )
*   **VS Code:** [Link para download do VS Code](https://code.visualstudio.com/ )

### 2. Configuração Inicial do Git (Apenas na Primeira Vez)

Se é a primeira vez que você usa o Git nesta máquina, configure sua identidade. Abra um terminal e execute:
```bash
git config --global user.name "Seu Nome Completo"
git config --global user.email "seu-email@exemplo.com"
```

### 3. Script de Instalação Automatizada (Copiar e Colar)

O script abaixo fará todo o trabalho pesado: clonar o projeto, instalar dependências, configurar o ambiente e iniciar o servidor.

**Instruções:**
1.  Abra o **VS Code**.
2.  Vá em `File > Open Folder...` e escolha (ou crie) uma pasta vazia para o projeto.
3.  Dentro do VS Code, abra o terminal integrado com o atalho `Ctrl + '` (Control + Aspas Simples).
4.  **Copie o bloco de código inteiro abaixo e cole no terminal.**
5.  Pressione Enter e aguarde a conclusão de todos os passos.

```powershell
# --- INÍCIO DO SCRIPT DE INSTALAÇÃO ---

# 1. Clonar o repositório
git clone https://github.com/FaeddaGabriel/Grupo-DS.git .;

# 2. Instalar dependências
echo "Instalando dependências do Composer e NPM...";
composer install --prefix src;
npm install;

# 3. Configurar o ambiente Laravel
echo "Configurando o ambiente Laravel...";
cp src/.env.example src/.env;
php src/artisan key:generate;
php src/artisan storage:link;

# 4. Configurar o banco de dados
echo "Executando migrações e seeders...";
php src/artisan migrate --force --seed;

# 5. Iniciar o servidor
echo "Iniciando o servidor Laravel! O projeto será aberto no seu navegador.";
Start-Process powershell -ArgumentList "php src/artisan serve"; # Inicia o Laravel (backend ) em uma nova janela.
Start-Process "http://127.0.0.1:8000"; # Abre o site no navegador

echo "Instalação concluída! Uma nova janela do terminal foi aberta para o servidor.";

# --- FIM DO SCRIPT DE INSTALAÇÃO ---
```

---

## 🛠️ Testando a API com o Postman

### Testando o Upload de Foto de Perfil

**1. Gerar um Token de Acesso**

Para interagir com a API, você precisa de um token. Execute o comando abaixo no terminal, na raiz do projeto, para abrir o Tinker:
```bash
php src/artisan tinker
```
Dentro do Tinker, execute o seguinte para gerar um token para o usuário de ID 1 e copie o resultado:
```php
$user = App\Models\User::find(1 );
echo $user->createToken('PostmanToken')->plainTextToken;
```

**2. Configurar a Requisição no Postman**
*   **Método:** `POST`
*   **URL:** `http://127.0.0.1:8000/api/perfil/foto`
*   **Headers:** `Accept: application/json`, `Authorization: Bearer SEU_TOKEN_AQUI`
*   **Body:** `form-data`, chave `foto` do tipo `File`.

---
