@extends('layouts.layoutPrincipal') 
@section('content') 
<link rel="stylesheet" href="{{ asset('css/home.css') }}" /> 

<nav>
    <a href="{{route('index')}}" id="logo"
        ><img
            src="{{asset('img/icone_charlie1-2.png')}}"
            id="img1"
            title="logo" />
        <p>Charlie</p>
        <img src="{{asset('img/icone_charlie2-2.png')}}" id="img2" title="logo"
    /></a>
    <a href="javascript:void(0);" class="icon" onclick="resp_nav()">
        <i class="fa fa-bars"></i>
    </a>
    <section id="navbar" class="">
        <i
            class="fas fa-moon change_mode"
            onclick="change_mode()"
            alt="Modo escuro"
            id="change_mode"
        ></i>
        <a href="#" id="nav-link">Sobre nós</a>
        <a href="{{route('cursos.index')}}" id="nav-link">Cursos</a>
        <a href="inscrever.html" class="botao">Inscreva-se</a>
    </section>
</nav>

<figure class="figuras">
    <p id="fig0" class="figura">. . .</p>
    <p id="fig1" class="figura">()</p>
    <p id="fig2" class="figura">< /></p>
    <p id="fig3" class="figura">{}</p>
    <p id="fig4" class="figura">...</p>
    <p id="fig5" class="figura">()</p>
    <p id="fig6" class="figura">0101</p>
    <p id="fig7" class="figura">. . .</p>
    <p id="fig8" class="figura">{}</p>
</figure>

<!----- MAIN ----->

<div class="main">
    <div class="titulo_principal">
        <img src="{{asset('img/icone_charlie1-2.png')}}" class="img-1" />
        <h1 id="titulo_principal">
            <p>Aprenda programação</p>
            <p style="font-weight: bold">gratuitamente!</p>
        </h1>
        <img class="img-2" src="{{asset('img/icone_charlie2-2.png')}}" alt="" />
        <p id="txtTitulo">
            <mark>/* </mark>Charlie é uma plataforma de estudos que
            disponibiliza cursos na área da programação sem qualquer custo.<mark>
                */</mark
            >
        </p>

        <section id="botoes">
            <a href="{{route('users.create')}}" class="botao" id="btnTitInscrever"
                >Quero me inscrever!</a
            >
            <a href="{{route('users.index')}}" class="botao" id="btnTitLogar"
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
        <a href="{{route('cursos.index')}}"><mark>//Clique para ver mais</mark></a>
    </div>
</div>

<div class="final">
    <div class="titulo"><h1>Se interessou? É de graça. Clica aí!</h1></div>
    <a href="inscrever.html"><button class="botao">Inscrever-se :)</button></a>
</div>
@stop
