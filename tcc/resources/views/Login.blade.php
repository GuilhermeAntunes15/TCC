<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Login</title>
  </head>
  <body class="login">
    <nav></nav>
    <div class="main">
      <div>
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
        <input type="submit" value="Continuar" id="botao" />
      </form>
    </div>
  </body>
</html>
