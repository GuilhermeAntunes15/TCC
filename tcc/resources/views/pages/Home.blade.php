<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/paginas.css') }}" />
    <link
      rel="shortcut icon"
      href="{{ asset('img/icone_charlie.png') }}"
      type="image/x-icon"
    />
    <script src="{{ asset('js/principal.js') }}"></script>
    <script
      src="https://kit.fontawesome.com/04cbf46b06.js"
    ></script>
    <title>Página Inicial - TCC</title>
  </head>
  <body>
    <nav>
      <a href="index.html" id="logo"
        ><img src="Imagens/Icones/icone_charlie1-2.png" title="logo" /><p>Charlie</p><img
          src="Imagens/Icones/icone_charlie2-2.png" title="logo"
      /></a>
      <section class="nav-direita-normal" id="navbar">
        <i
          class="fas fa-moon"
          onclick="change_mode()"
          alt="Modo escuro"
          id="change_mode"
        ></i>
        <a href="#" id="nav-link">Sobre nós</a>
        <a href="#" id="nav-link">Cursos</a>
        <a href="inscrever.html" class="botao">Inscreva-se</a>
        <a href="javascript:void(0);" id="open_nav" onclick="open_nav()">
          <i class="fa fa-bars"></i>
        </a>
      </section>
    </nav>
    <main><p>Lorem, ipsum dolor sit amet <mark class="comentario">/*consectetur adipisicing elit.*/</mark> Voluptate eos sequi ratione veritatis? Ratione fugiat laudantium quae unde odio, non earum pariatur deserunt corporis, inventore accusantium sint porro necessitatibus, tempore saepe. Alias sint repellendus eveniet possimus sed fuga, sunt voluptatum.</p><main>
  </body>
</html>

