# La Torre

Site de cardápio da La Torre Pizzaria e Sorveteria, agora estruturado em Laravel 12 e mantendo o layout original na view `welcome`.

## Estrutura do projeto

- `artisan` — comando principal do Laravel
- `routes/web.php` — rota da página inicial
- `resources/views/welcome.blade.php` — carrega o layout do cardápio
- `public/style.css` — estilos visuais do site
- `public/script.js` — interações e animações do cardápio

## Como executar

### Com Laravel

1. Instale as dependências:
   - `composer install`
2. Inicie o servidor:
   - `php artisan serve`
3. Abra no navegador:
   - `http://127.0.0.1:8000`

### Com Laragon / XAMPP

1. Coloque a pasta do projeto no diretório do servidor local.
2. Aponte o servidor para a pasta `public`.
3. Abra a aplicação no navegador.

## Funcionalidades

- Cardápio organizado por categorias
- Botões de pedido via WhatsApp
- Navegação por seções
- Estilo visual moderno e responsivo
- Estrutura pronta em Laravel 12

## Observação

O layout do cardápio permanece o mesmo, mas agora é servido pela view `welcome` do Laravel.
