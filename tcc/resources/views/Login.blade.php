<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link
      rel="shortcut icon"
      href="{{ asset('img/icone_charlie.png') }}"
      type="image/x-icon"
    />
    <script src="{{ asset('js/principal.js') }}"></script>
    <script
      src="https://kit.fontawesome.com/04cbf46b06.js"
      crossorigin="anonymous"
    ></script>
    <title>Login - TCC</title>
  </head>
  <body>
    <nav>
      <a href="index.html" id="logo"
        ><img src="{{ asset('img/icone_charlie1-2.png') }}" title="logo" />Charlie
        <img src="{{ asset('img/icone_charlie2-2.png') }}" title="logo"/>
      </a>
      <section class="nav-direita-normal" id="navbar">
        <i
          class="fas fa-moon"
          onclick="change_mode()"
          alt="Modo escuro"
          id="change_mode"
        ></i>
    </nav>

    <div class="main">
      <div id="titulo">
        <h1>Login</h1>
      </div>

      <form action="">
        <input
          type="text"
          name="nome"
          placeholder="E-mail ou apelido"
          id="txtEmailApelido"
        />
        <input type="text" name="senha" placeholder="Senha" id="txtSenha" />
        <a href="{{route('signup.create')}}" id="aInscrever">Ainda não sou inscrito</a>
        <input type="submit" value="Continuar" class="botao" />
      </form>
    </div>
  </body>
</html>
