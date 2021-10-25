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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="{{ asset('js/principal.js') }}"></script>
    <script
      src="https://kit.fontawesome.com/04cbf46b06.js"
      crossorigin="anonymous"
    ></script>
    <title>Inscrever-se - TCC</title>
  </head>
  <body>
    <nav id="navbar" class="navbar">
      <a href="{{route('index')}}" id="logo">
        <img src="{{ asset('img/icone_charlie1-2.png') }}" title="logo" />Charlie
        <img src="{{ asset('img/icone_charlie2-2.png') }}" title="logo"/>
      </a>
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
        <h1>Inscrever-se</h1>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="alert-list">
                @foreach ($errors->all() as $error)
                    <li style="color: aliceblue;  list-style-type: none;" class="alert-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')
        <input
          type="text"
          name="nome"
          placeholder="Nome completo"
          id="txtNome"
        />
        <input
          type="text"
          name="login"
          placeholder="Login" 
          id="txtLogin"
        />
        <input type="email" name="email" placeholder="E-mail" id="txtEmail" />
        <input type="date" name="dt_nasc" placeholder="E-mail" id="txtDataNasc" />
        <input type="password" name="senha" placeholder="Senha" id="txtSenha" />
        <input type="password" name="senha_conf" placeholder="Confirme sua senha"
        id="txtSenhaConf">
        <a href="{{route("users.index")}}" id="aLogin">Já sou inscrito</a>
        <input type="submit" value="Continuar" class="botao" />
      </form>
    </main>
  </body>
</html>

