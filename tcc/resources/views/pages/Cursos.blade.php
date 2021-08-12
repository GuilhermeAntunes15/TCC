@extends('layouts.layoutPrincipal')
@section('content')

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

    @stop
