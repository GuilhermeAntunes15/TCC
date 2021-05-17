<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Inscrever-se</title>
  </head>
  <body class="inscrever">
    <div class="main"> 
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

      <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        @method('POST')
        <input
          type="text"
          name="txtNome"
          placeholder="Nome completo"
          id="txtNome"
        />
        <input
          type="text"
          name="txtLogin"
          placeholder="Login"
          id="txtLogin"
        />
        <input type="text" name="txtEmail" placeholder="E-mail" id="txtEmail" />
        <input type="date" name="txtDataNasc" placeholder="E-mail" id="txtDataNasc" />
        <input type="text" name="txtSenha" placeholder="Senha" id="txtSenha" />
        <input type="text" name="senha_conf" placeholder="Confirme sua senha"
        id="txtSenhaConf">
        <a href="login.html" id="aLogin">Já sou inscrito</a>
        <input type="submit" value="Continuar" id="botao" />
      </form>
    </div>
  </body>
</html>
