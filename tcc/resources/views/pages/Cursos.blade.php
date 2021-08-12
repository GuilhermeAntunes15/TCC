<!DOCTYPE html>
<html lang="pt" class="black-mode">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}" />
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
    <title>Cursos</title>
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
        <a href="cursos.html" id="nav-link" style="text-decoration: underline"
          >Cursos</a
        >
        <a href="inscrever.html" class="botao">Inscreva-se</a>
      </section>
    </nav>

    <!----- MAIN ----->

    <section id="diretorios" class="comentario">
      <p>Cursos/</p>
      <p id="dir_atual">Nome do curso</p>
    </section>

    <main>
      <div id="curso">
        <h2 id="titulo_curso">
          <i class="fas fa-angle-right"></i>
          Nome do curso
        </h2>

        <div id="dados_curso">
          <section class="imagem" id="img_curso">
            <img src="https://media.giphy.com/media/vFKqnCdLPNOKc/giphy.gif" />
          </section>

          <section id="descricao">
            <p class="comentario">// DESCRIÇÃO</p>
            <p>
              Descrição bonitona aaa Descrição bonitona aaa Descrição bonitona
              aaa Descrição Descrição bonitona aaa Descrição bonitona aaa
              Descrição bonitona aaa Descrição (apoio)
            </p>
            <div id="desc_lista">
              <p id="desc_lista_item">
                <i class="far fa-clock"></i> Horas totais de conteúdo: XX
              </p>
              <p id="desc_lista_item">
                <i class="fas fa-video"></i> Aulas totais: XX
              </p>
            </div>

            <a href="curso_aula.html" class="botao" id="desc_botao"
              >Começar curso</a
            >
          </section>

          <p id="curso_andamento">* Curso em andamento</p>
        </div>
      </div>

      <!--------------------------------------------->

      <div class="requisitos" id="requisitos">
        <h3>Requisitos:</h3>
        <div id="requis_itens">
          <p>Requisito</p>
          <p>Requisito</p>
          <p>Requisito</p>
          <p>Requisito</p>
          <p>Requisito</p>
          <p>Requisito</p>
          <p>Requisito</p>
        </div>
      </div>

      <div class="aulas" id="aulas">
        <h2>Aulas</h2>
        <div class="aulas_container">
          <div class="aulas_itens">
            <img src="https://picsum.photos/id/1025/600/400" alt="" />
            <div class="aulas_itens_texto">
              <p class="aulas_itens_titulo">1. Título da aula</p>
              <p class="aulas_itens_tempo">00 min.</p>
            </div>
          </div>
          <div class="aulas_itens">
            <img src="https://picsum.photos/id/1025/600/400" alt="" />
            <div class="aulas_itens_texto">
              <p class="aulas_itens_titulo">1. Título da aula</p>
              <p class="aulas_itens_tempo">00 min.</p>
            </div>
          </div>
          <div class="aulas_itens">
            <img src="https://picsum.photos/id/1025/600/400" alt="" />
            <div class="aulas_itens_texto">
              <p class="aulas_itens_titulo">1. Título da aula</p>
              <p class="aulas_itens_tempo">00 min.</p>
            </div>
          </div>
          <div class="aulas_itens">
            <img src="https://picsum.photos/id/1025/600/400" alt="" />
            <div class="aulas_itens_texto">
              <p class="aulas_itens_titulo">1. Título da aula</p>
              <p class="aulas_itens_tempo">00 min.</p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer><p>Charlie@2021</p></footer>
  </body>
</html>
