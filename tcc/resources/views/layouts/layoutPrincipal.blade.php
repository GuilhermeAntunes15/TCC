<!DOCTYPE html>
<html lang="pt" class="black-mode">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    <link
      rel="shortcut icon"
      href="{{ asset('img/icone_charlie.png') }}"
      type="image/x-icon"
    />
    <script
      src="https://kit.fontawesome.com/04cbf46b06.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="{{ asset('js/principal.js') }}"></script>
    <title>Página Inicial</title>
  </head>
  <body>
    <nav>
      <a href="index.html" id="logo"
        ><img
        src="{{ asset('img/icone_charlie1-2.png') }}"
          id="img1"
          title="logo" />
        <p>Charlie</p>
        <img src="{{ asset('img/icone_charlie2-2.png') }}" id="img2" title="logo"
      /></a>
      <a href="javascript:void(0);" class="icon" onclick="resp_nav()">
        <i class="fa fa-bars"></i>
      </a>
      <section id="navbar" class="navbar">
        <i
          class="fas fa-moon change_mode"
          onclick="change_mode()"
          alt="Modo escuro"
          id="change_mode"
        ></i>
        <a href="#" id="nav-link">Sobre nós</a>
        <a href="cursos.html" id="nav-link">Cursos</a>
        <a href="inscrever.html" class="botao">Inscreva-se</a>
      </section>
    </nav>

        <main>
            @yield('content')
        </main>
    <footer><p>Charlie@2021</p></footer>
  </body>
</html>

