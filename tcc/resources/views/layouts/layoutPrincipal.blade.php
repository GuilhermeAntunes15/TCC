<!DOCTYPE html>
<html lang="pt" class="black-mode">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/cursos_menu.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}" /> --}}
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
        <main>
            @yield('content')
        </main>
    <footer><p>Charlie@2021</p></footer>
  </body>
</html>
