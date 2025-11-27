# Paleta de Cores Oficial - SportsKing

## Cores Principais

### Painel Administrativo
- **Fundo Escuro Principal:** `#2d3748`
- **Fundo Escuro Secundário:** `#4a5568`
- **Texto Claro:** `#e2e8f0`
- **Texto Branco:** `#ffffff`

### Interface Pública
- **Azul Principal:** `#0077ff`
- **Azul Escuro:** `#1f008d`
- **Azul Hover:** `#005bb5`
- **Azul Marinho:** `#296cb8`

### Fundos e Neutros
- **Branco:** `#ffffff`
- **Cinza Claro:** `#f7fafc`
- **Cinza Médio:** `#e2e8f0`
- **Cinza Escuro:** `#718096`
- **Preto:** `#000000`

### Estados e Feedback
- **Sucesso (fundo):** `#d1f5d3`
- **Sucesso (texto):** `#27632a`
- **Sucesso (borda):** `#b5e3b8`
- **Hover Laranja:** `#f4a261`

## Uso Recomendado

### Botões
- **Primário:** Fundo `#0077ff`, Hover `#005bb5`
- **Painel Admin:** Fundo `#4a5568`, Hover `#2d3748`
- **Secundário:** Fundo `#333`, Hover `#0077ff`

### Formulários
- **Borda:** `#1f008d`
- **Focus:** `#0077ff` (box-shadow)
- **Fundo:** `#ffffff`

### Tabelas
- **Cabeçalho:** `#2d3748`
- **Linha Par:** `#f7fafc`
- **Hover:** `#f7fafc`
- **Borda:** `#e2e8f0`

### Navbar
- **Transparente:** `transparent`
- **Scrolled:** `#2d3748`
- **Links:** `#000000` (normal), `#ffffff` (scrolled)
- **Hover:** `#0077ff` (normal), `#e2e8f0` (scrolled)

## Gradientes

### Fundo de Páginas
```css
background: linear-gradient(to bottom, #ffffff, #3ca7ff);
```

### Hero Section
```css
background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), url("/images/olympic.jpg");
```

## Observações

- Evitar uso de azul `#007bff` (Bootstrap padrão) - usar `#0077ff` ou cores do painel
- Manter consistência entre painel administrativo e interface pública
- Usar `#2d3748` e `#4a5568` para elementos administrativos
- Usar tons de azul (`#0077ff`, `#1f008d`) para interface pública
