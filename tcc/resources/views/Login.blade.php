<!DOCTYPE html>
<html lang="pt" class="black-mode">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/login.css')}}" />
    <link
      rel="shortcut icon"
      src="{{ asset('img/icone_charlie.png')}}"
      type="image/x-icon"
    />
    <title>Login - TCC</title>
  </head>
  <body>
    <nav id="navbar" class="">
      <a href="{{route('index')}}" id="logo"
        ><img
          src="{{ asset('img/icone_charlie1-2.png')}}"
          title="logo" />Charlie<img
          src="{{ asset('img/icone_charlie2-2.png')}}"
          title="logo"
      /></a>
      <section class="nav-direita-normal" id="navbar">
        <i
          class="fas fa-moon"
          onclick="change_mode()"
          alt="Modo escuro"
          id="change_mode"
        ></i>
      </section>
    </nav>

    <main>
      <div id="titulo">
        <h1>Login</h1>
      </div>

      <form action="{{route('users.login')}}" method="post">
        @method('post')
        @csrf
        <input
          type="text"
          name="usuario"
          placeholder="Usuario"
          id="usuario"
        />
        <input type="password" name="senha" placeholder="Senha" id="txtSenha" />
        <a href="{{route('users.create')}}" id="aInscrever">Ainda não sou inscrito</a>
        <button type="submit" class="botao" id="btnEntrar">Entrar</button>
      </form>
    </div>
  </body>

  <script
  src="https://kit.fontawesome.com/04cbf46b06.js"
  crossorigin="anonymous"
></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="{{ asset('js/principal.js') }}"></script>
</html>
