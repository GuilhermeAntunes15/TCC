@extends('layouts.layoutPrincipal')
@section('content')

      <div class="titulo_principal">
        <img src="{{ asset('img/icone_charlie1-2.png') }}" class="img-1" />
        <h1 id="titulo_principal">
          <p>Aprenda programação</p>
          <p style="font-weight: bold">gratuitamente!</p>
        </h1>
        <img class="img-2" src="{{ asset('img/icone_charlie2-2.png') }}" alt="" />
        <p id="txtTitulo">
          <mark>/* </mark>Charlie é uma plataforma de estudos que disponibiliza
          cursos na área da programação sem qualquer custo.<mark> */</mark>
        </p>

        <section id="botoes">
          <a href="inscrever.html" class="botao" id="btnTitInscrever"
            >Quero me inscrever!</a
          >
          <a href="login.html" class="botao" id="btnTitLogar"
            >Já sou inscrito</a
          >
        </section>
      </div>

      <div class="cursos">
        <h2>Nossos cursos</h2>
        <div class="cursos_itens">
          <div class="item_curso1" id="num_1">
            <div class="num_curso">1</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
          </div>

          <div class="item_curso2" id="num_2">
            <div class="num_curso">2</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
          </div>

          <div class="item_curso3" id="num_3">
            <div class="num_curso">3</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
          </div>
        </div>
        <p><mark>//Clique para ver mais</mark></p>
      </div>
    </main>

    <div class="final">
      <div class="titulo"><h1>Se interessou? É de graça. Clica aí!</h1></div>
      <a href="inscrever.html"
        ><button class="botao">Inscrever-se :)</button></a
      >
    </div>

@stop