# Instruções de Testes - Projeto SportsKing

Este documento contém as instruções para testar cada uma das funcionalidades implementadas nas diferentes branches do projeto.

---

## 🎯 Resumo das Branches e Tarefas Implementadas

Este projeto foi desenvolvido em 5 tarefas sequenciais, cada uma em sua própria branch:

1. **feat/dashboard-redesign**: Modernização completa do dashboard com novo design e gráficos ECharts
2. **refactor/estrutura-aplicacao**: Reestruturação do código com criação de layouts e componentes
3. **feat/dados-de-teste**: Criação de seeders para popular o banco com dados de teste
4. **feat/pagina-exercicios**: Implementação dos exercícios do PDF com consultas de agregação
5. **main-integrado**: Branch consolidada com todas as features implementadas

### Como Testar a Branch Consolidada (main-integrado)

A branch `main-integrado` contém todas as alterações das 4 tarefas anteriores. Para testá-la:

1. **Fazer checkout da branch**:
   ```bash
   git checkout main-integrado
   ```

2. **Configurar o ambiente**:
   - Configure o arquivo `.env` com as credenciais do banco de dados
   - Execute: `composer install` (se necessário)
   - Execute: `php artisan migrate:fresh --seed` (para criar as tabelas e popular com dados)

3. **Iniciar o servidor**:
   ```bash
   php artisan serve
   ```

4. **Testar as funcionalidades**:
   - Acesse `http://localhost:8000/Login`
   - Faça login com um usuário administrador (nível 0)
   - Navegue pelo Dashboard (rota `/Dashboard`)
   - Navegue pela página de Análise (rota `/analise`)
   - Verifique se todos os gráficos estão renderizando corretamente
   - Teste a responsividade do layout

### Tecnologias Utilizadas

- **Backend**: Laravel (PHP)
- **Frontend**: Blade Templates, HTML5, CSS3
- **Gráficos**: ECharts 5.4.3
- **Banco de Dados**: MySQL (via migrations e seeders)

---

## Instruções Detalhadas por Tarefa

---

## Testando a Tarefa 2 (Branch: refactor/estrutura-aplicacao)

### Objetivo
Verificar se a reestruturação do código foi realizada com sucesso, incluindo a criação de layouts e componentes reutilizáveis.

### Passos para Testar

1. **Verificar a estrutura de arquivos**
   - Confirme que a pasta `resources/views/layouts` foi criada
   - Verifique se existem os arquivos:
     - `resources/views/layouts/base.blade.php`
     - `resources/views/layouts/menu.blade.php`

2. **Navegar por todas as páginas do site**
   - Acesse a página inicial (`/`)
   - Acesse a página de login (`/Login`)
   - Acesse a página de cadastro (`/Cadastro`)
   - Acesse a página de contato (`/Contato`)
   - Acesse o dashboard (`/Dashboard`)

3. **Verificar se todas as páginas continuam funcionando**
   - Confirme que não há quebras visuais
   - Verifique se o menu lateral aparece corretamente no dashboard
   - Teste a navegação entre as páginas

4. **Verificar a consistência do layout**
   - O dashboard deve usar o layout base e incluir o menu lateral
   - O menu deve ser consistente em todas as páginas que o utilizam

### Observações
- Esta tarefa focou na organização do código, não em mudanças visuais
- O comportamento das páginas deve permanecer o mesmo

---

## Testando a Tarefa 3 (Branch: feat/dados-de-teste)

### Objetivo
Verificar se os seeders foram criados corretamente e se conseguem popular o banco de dados com dados de teste.

### Passos para Testar

1. **Configurar o arquivo .env**
   - Certifique-se de que o arquivo `.env` está configurado com as credenciais corretas do banco de dados
   - Verifique as variáveis: `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

2. **Executar as migrations e seeders**
   - Execute o comando: `php artisan migrate:fresh --seed`
   - Este comando irá:
     - Recriar todas as tabelas do banco de dados
     - Executar os seeders `UsuarioSeeder` e `ContatoSeeder`

3. **Verificar o banco de dados**
   - Acesse o banco de dados (via phpMyAdmin, MySQL Workbench ou linha de comando)
   - Verifique se a tabela `users` contém aproximadamente 60 registros
   - Verifique se a tabela `tbcontato` contém aproximadamente 120 registros
   - Confirme que as datas de `created_at` estão distribuídas ao longo dos últimos 12 meses

4. **Acessar o Dashboard**
   - Faça login como administrador
   - Acesse a rota `/Dashboard`
   - Os gráficos agora devem exibir dados ricos e variados:
     - O gráfico de linha deve mostrar a distribuição de usuários por mês
     - O gráfico de barras deve mostrar a comparação entre usuários com e sem ocorrência
     - Os cards de indicadores devem mostrar números realistas

### Observações
- **Importante**: O comando `migrate:fresh` irá apagar todos os dados existentes no banco
- Se você já possui dados importantes, use apenas `php artisan db:seed` para executar os seeders
- Os seeders criam:
  - 60 usuários com datas variadas nos últimos 12 meses
  - 120 contatos com mensagens de tamanhos variados (curtas, médias e longas)

---

## Testando a Tarefa 4 (Branch: feat/pagina-exercicios)

### Objetivo
Verificar se a página de análise foi criada corretamente com as 4 consultas de agregação e os 2 gráficos ECharts.

### Passos para Testar

1. **Verificar a estrutura de arquivos**
   - Confirme que o arquivo `resources/views/analise.blade.php` foi criado
   - Verifique se a rota `/analise` foi adicionada em `routes/web.php`
   - Confirme que o método `analise()` foi adicionado em `app/Http/Controllers/UsuarioController.php`

2. **Acessar a página de análise**
   - Faça login como administrador
   - No menu lateral, clique no novo link "Análise" (ícone 📈)
   - Ou acesse diretamente a rota `/analise`

3. **Verificar as consultas de agregação**
   - A página deve exibir 4 tabelas com os resultados das consultas:
     1. **Usuários por Nível de Acesso**: Mostra a quantidade de administradores e usuários comuns
     2. **Usuários Cadastrados por Mês**: Mostra os cadastros dos últimos 6 meses
     3. **Contatos por Tamanho de Mensagem**: Agrupa os contatos por tamanho (curta, média, longa, muito longa)
     4. **Usuários Cadastrados por Dia da Semana**: Mostra a distribuição de cadastros por dia da semana

4. **Verificar os gráficos ECharts**
   - A página deve exibir 2 gráficos diferentes:
     1. **Gráfico de Barras Horizontais**: Distribuição de usuários por nível de acesso
     2. **Gráfico de Área**: Evolução de cadastros nos últimos 6 meses
   - Os gráficos devem ser interativos (tooltips ao passar o mouse)
   - Teste a responsividade redimensionando a janela

5. **Verificar a navegação**
   - O link "Análise" no menu lateral deve estar destacado quando na página
   - Navegue entre Dashboard e Análise para verificar que ambas as páginas funcionam corretamente

### Observações
- Esta tarefa implementa os exercícios solicitados no PDF:
  - ✅ Pelo menos 4 consultas com funções de agregação
  - ✅ Pelo menos 2 gráficos de tipos diferentes usando ECharts
- Os gráficos utilizam dados reais do banco de dados (não são estáticos)
- As consultas utilizam funções SQL de agregação: `COUNT()`, `GROUP BY`, `DATE_FORMAT()`, `CASE WHEN`, etc.

---

## Testando a Tarefa 1 (Branch: feat/dashboard-redesign)

### Objetivo
Verificar se o dashboard foi modernizado com sucesso, incluindo o novo design, menu lateral escuro e gráficos ECharts.

### Passos para Testar

1. **Acessar a rota `/Dashboard`**
   - Faça login como administrador (usuário com `nivel_acesso = 0`)
   - Navegue até a rota `/Dashboard`

2. **Verificar o menu lateral**
   - Confirme que o menu lateral está visível no lado esquerdo da tela
   - Verifique se o menu possui fundo escuro (`#2d3748`)
   - Verifique se o texto está claro (`#e2e8f0`)
   - Confirme que o menu é fixo (não rola com a página)

3. **Verificar os cards de indicadores**
   - Confirme que existem 4 cards no topo da área de conteúdo:
     - **Usuários**: Total de usuários cadastrados
     - **Com Ocorrência**: Usuários com nível de acesso 0
     - **Sem Ocorrência**: Usuários com nível de acesso 1
     - **Este Mês**: Usuários cadastrados no mês atual

4. **Verificar os gráficos ECharts**
   - Confirme que existem 4 gráficos organizados em grid 2x2:
     1. **Gráfico de Linha**: Usuários cadastrados por mês (últimos 12 meses)
     2. **Gráfico de Pizza**: Distribuição de gênero (dados de exemplo)
     3. **Gráfico de Barras**: Comparativo entre usuários que fizeram e não fizeram ocorrência
     4. **Gráfico de Radar**: Análise multivariada departamental (dados de exemplo)

5. **Verificar a renderização dos gráficos**
   - Os gráficos devem renderizar corretamente, mesmo que com dados limitados
   - Passe o mouse sobre os gráficos para verificar os tooltips interativos
   - Redimensione a janela do navegador para verificar a responsividade

### Observações
- Se não houver dados suficientes no banco, os gráficos podem aparecer vazios ou com poucos pontos
- A Tarefa 3 criará seeders para popular o banco com dados de teste

---

## Testando a Tarefa 2 (Branch: refactor/estrutura-aplicacao)

### Objetivo
Verificar se a reestruturação do código foi realizada com sucesso, incluindo a criação de layouts e componentes reutilizáveis.

### Passos para Testar

1. **Verificar a estrutura de arquivos**
   - Confirme que a pasta `resources/views/layouts` foi criada
   - Verifique se existem os arquivos:
     - `resources/views/layouts/base.blade.php`
     - `resources/views/layouts/menu.blade.php`

2. **Navegar por todas as páginas do site**
   - Acesse a página inicial (`/`)
   - Acesse a página de login (`/Login`)
   - Acesse a página de cadastro (`/Cadastro`)
   - Acesse a página de contato (`/Contato`)
   - Acesse o dashboard (`/Dashboard`)

3. **Verificar se todas as páginas continuam funcionando**
   - Confirme que não há quebras visuais
   - Verifique se o menu lateral aparece corretamente no dashboard
   - Teste a navegação entre as páginas

4. **Verificar a consistência do layout**
   - O dashboard deve usar o layout base e incluir o menu lateral
   - O menu deve ser consistente em todas as páginas que o utilizam

### Observações
- Esta tarefa focou na organização do código, não em mudanças visuais
- O comportamento das páginas deve permanecer o mesmo

---

