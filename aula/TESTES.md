# Instruções de Testes - Projeto SportsKing

Este documento contém as instruções para testar cada uma das funcionalidades implementadas nas diferentes branches do projeto.

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

